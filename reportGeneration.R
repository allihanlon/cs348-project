# install.packages("RMySQL")
library(RMySQL)

# Password for phpmyAdmin, not for your Career Account
mydb <- dbConnect(MySQL(), user='g1117061', password='!@Pod2020', dbname='g1117061', host='mydb.itap.purdue.edu')
# Important otherwise can leave connection open and ITaP gets MAD as it drains on the MySQL server!
on.exit(dbDisconnect(mydb))

#allows the arguments from the form on the website to be passed to the R script
args <- commandArgs(TRUE)
podcastTitle <- args[1]

# Start the transaction
dbExecute(mydb, "SET autocommit=0;")
dbExecute(mydb, "SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;")
dbExecute(mydb, "START TRANSACTION;")
tryCatch( {
        # query for counting the podcast ratings by date for a selected podcast
        likes <- dbGetQuery(mydb, paste("SELECT COUNT(rating),dateLiked FROM Likes JOIN Episode ON Likes.episodeID = Episode.EpisodeID WHERE Episode.podcastTitle = '",podcastTitle,"' GROUP BY dateLiked;", sep = ""))
        podcastHost <- dbGetQuery(mydb, paste("SELECT username FROM Podcast WHERE podcastTitle = '",podcastTitle,"';", sep = ""))

        #names the file
        jpeg(paste(podcastHost,'RatingsOverTime.jpeg', sep=""))
        ##plots the likes query w bars
        barplot(likes$`COUNT(rating)`,
                main=paste("Number of Ratings by Date for", podcastTitle ),
                ylab="Likes", xlab = "Date",
                names.arg = as.Date(likes$dateLiked),
                col = "darkred",
                horiz = FALSE)
        dev.off()
        ##return value is the file location
        returnVal <- paste(podcastHost,'RatingsOverTime.jpeg', sep="")
        returnVal
}, error = function() {dbRollback(mydb) })

# Finish the Transaction
dbExecute(mydb, "SET autocommit=1;")

