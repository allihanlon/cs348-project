# install.packages("RMySQL")
library(RMySQL)

# Password for phpmyAdmin, not for your Career Account
mydb <- dbConnect(MySQL(), user='g1117061', password='!@Pod2020', dbname='g1117061', host='mydb.itap.purdue.edu')
# Important otherwise can leave connection open and ITaP gets MAD as it drains on the MySQL server!
on.exit(dbDisconnect(mydb))

# Allows the arguments from the form on the website to be passed to the R script
args <- commandArgs(TRUE)
title <- args[1]

# Start the transaction
dbExecute(mydb, "SET autocommit=0;")
dbExecute(mydb, "SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;")
dbExecute(mydb, "START TRANSACTION;")

# Execute access in a try-catch
tryCatch( {
        # Queries for getting a selected podcast; associated podcast host
        listeners <- dbGetQuery(mydb, paste("SELECT COUNT(*), dateListened FROM Listen as L JOIN Episode as E ON L.episodeTitle = E.episodeTitle WHERE E.podcastTitle = '",title,"' GROUP BY dateListened;", sep = ""))
        podcastHost <- dbGetQuery(mydb, paste("SELECT P.username FROM Podcast as P WHERE podcastTitle = '",title,"';", sep = ""))

        # Name the file
        jpeg(paste(podcastHost,'ListenersOverTime.jpeg', sep=""))
        ## Plot 
        plot(x = as.Date(listeners$dateListened), 
             y = listeners$`COUNT(*)`, 
             ylim = c(0, max(listeners$`COUNT(*)`)), 
             type = "b", 
             main = "Number of Listeners By Day", 
             xlab = "Date", 
             ylab = "Total Listeners")
        dev.off()

        ## Return value is the file location
        returnVal <- paste(podcastHost,'ListenersOverTime.jpeg', sep="")
        returnVal
}, error = function() {dbRollback(mydb) })

# Finish the Transaction
dbExecute(mydb, "SET autocommit=1;")

