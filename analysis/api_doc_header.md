# General notes

## Request parameters

Request parameters must be sent when needed in the body of the request, in JSON format. The only exception is for GET requests, when the parameters must be sent in the query string.

## Token

In almost every request, a header "Token" is required.

The exceptions are when the user is not logged in (account creation and the login proccess itself).

A token is valid for 12 hours, and you can "renew" it anytime you want.

## Team responsible

The first user to be assigned in a team is the team's administrator on the system.

This user needs to get verified for being the administrator.

The verification proccess is yet being designed, but may be a manual proccess (like some kind of post on Facebook, proving that the person has access to the Facebook page's administration).