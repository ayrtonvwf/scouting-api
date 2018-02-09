define({
  "header": {
    "title": "General notes",
    "content": "<h1>General notes</h1>\n<h2>Token</h2>\n<p>In almost every request, a header &quot;Token&quot; is required.</p>\n<p>The exceptions are when the user is not logged in (account creation and the login proccess itself).</p>\n<p>A token is valid for 12 hours, and you can &quot;renew&quot; it anytime you want.</p>\n<h2>Team responsible</h2>\n<p>The first user to be assigned in a team is the team's administrator on the system.</p>\n<p>This user needs to get verified for being the administrator.</p>\n<p>The verification proccess is yet being designed, but may be a manual proccess (like some kind of post on Facebook, proving that the person has access to the Facebook page's administration).</p>\n"
  },
  "order": [
    "Auth",
    "AuthPost",
    "AuthRenew",
    "AuthDelete",
    "User",
    "UserGet",
    "UserPut",
    "UserPost",
    "UserDelete",
    "Team",
    "TeamGet",
    "Period",
    "PeriodGet",
    "QuestionType",
    "QuestionTypeGet",
    "Question",
    "QuestionGet",
    "Evaluation",
    "EvaluationGet",
    "EvaluationPut"
  ],
  "name": "scouting",
  "version": "1.0.0",
  "description": "A public FRC scouting application",
  "sampleUrl": false,
  "defaultVersion": "0.0.0",
  "apidoc": "0.3.0",
  "generator": {
    "name": "apidoc",
    "time": "2018-02-09T22:41:10.565Z",
    "url": "http://apidocjs.com",
    "version": "0.17.6"
  }
});
