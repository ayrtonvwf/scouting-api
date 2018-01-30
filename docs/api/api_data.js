define({ "api": [
  {
    "type": "post",
    "url": "/auth",
    "title": "Requests a new token for the provided credentials",
    "name": "AuthPost",
    "group": "Auth",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>User's e-mail.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>User's password.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>A new token valid for 12 hours.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Auth.php",
    "groupTitle": "Auth"
  },
  {
    "type": "get",
    "url": "/auth/renew",
    "title": "Retrieves a new token and invalidates the current one",
    "name": "AuthRenew",
    "group": "Auth",
    "version": "1.0.0",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>A new token valid for 12 hours.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Auth.php",
    "groupTitle": "Auth"
  },
  {
    "type": "get",
    "url": "/evaluation",
    "title": "Request Evaluation List",
    "name": "EvaluationGet",
    "group": "Evaluation",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>Id of the evaluation.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "team_id",
            "description": "<p>Id of the evaluated Team.</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "date_start",
            "description": "<p>Start date of the evaluation.</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "end_start",
            "description": "<p>End date of the evaluation.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "evaluations",
            "description": "<p>List of Evaluations</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "evaluations.id",
            "description": "<p>Id of the Evaluation.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "evaluations.team_id",
            "description": "<p>Id of the evaluated Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "evaluations.user_id",
            "description": "<p>Id of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "evaluations.created_at",
            "description": "<p>Creation date of the Evaluation.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "evaluations.answers",
            "description": "<p>List of Answers in the Evaluation.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "evaluations.answers.id",
            "description": "<p>Id of the Answer.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "evaluations.answers.question_id",
            "description": "<p>Id of the Question.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "evaluations.answers.value",
            "description": "<p>Value of the Answer.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Evaluation.php",
    "groupTitle": "Evaluation"
  },
  {
    "type": "put",
    "url": "/evaluation",
    "title": "Save or update Evaluation",
    "name": "EvaluationPut",
    "group": "Evaluation",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>Id of the Evaluation (if update).</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "team_id",
            "description": "<p>Id of the evaluated Team.</p>"
          },
          {
            "group": "Parameter",
            "type": "Object[]",
            "optional": false,
            "field": "answers",
            "description": "<p>Answers of the Evaluation.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "answers.question_id",
            "description": "<p>Id of the Question.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "answers.value",
            "description": "<p>Value of the Answer.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Evaluation.php",
    "groupTitle": "Evaluation"
  },
  {
    "type": "get",
    "url": "/period",
    "title": "Request Period List",
    "name": "PeriodGet",
    "group": "Period",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>Period id.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "position_start",
            "description": "<p>First position of the Period.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "position_end",
            "description": "<p>End position of the Period.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "search",
            "description": "<p>Search string.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "periods",
            "description": "<p>List of Periods</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "periods.id",
            "description": "<p>Id of the Period.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "periods.name",
            "description": "<p>Name of the Period.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "periods.position",
            "description": "<p>Position of the Period.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "periods.created_at",
            "description": "<p>Creation date of the Period.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Period.php",
    "groupTitle": "Period"
  },
  {
    "type": "get",
    "url": "/question/:id",
    "title": "Request Question information",
    "name": "QuestionGet",
    "group": "Question",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Question id.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Id of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "period_id",
            "description": "<p>Id of the Period of the Questions.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Description of the Question.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "question_type_id",
            "description": "<p>Id of the Type of the Question.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "created_at",
            "description": "<p>Creation date of the Question.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Question.php",
    "groupTitle": "Question"
  },
  {
    "type": "get",
    "url": "/question/list",
    "title": "Request Questions List",
    "name": "QuestionGetList",
    "group": "Question",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "period_id",
            "description": "<p>Id of the Period of the Questions.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "question_type_id",
            "description": "<p>Id of the Type of the Question.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "search",
            "description": "<p>Search string.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "questions",
            "description": "<p>List of Questions</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "questions.id",
            "description": "<p>Id of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "questions.period_id",
            "description": "<p>Id of the Period of the Questions.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "questions.description",
            "description": "<p>Description of the Question.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "questions.question_type_id",
            "description": "<p>Id of the Type of the Question.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "questions.created_at",
            "description": "<p>Creation date of the Question.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Question.php",
    "groupTitle": "Question"
  },
  {
    "type": "get",
    "url": "/question_type",
    "title": "Request Question Type List",
    "name": "QuestionTypeGet",
    "group": "QuestionType",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>Id of the Question Type.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "search",
            "description": "<p>Search string.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "question_types",
            "description": "<p>List of Question Types</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "question_types.id",
            "description": "<p>Id of the Question Type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "question_types.name",
            "description": "<p>Name of the Question Type.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "question_types.created_at",
            "description": "<p>Creation date of the Question Type.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Question_type.php",
    "groupTitle": "QuestionType"
  },
  {
    "type": "get",
    "url": "/team/:id",
    "title": "Request Team information",
    "name": "TeamGet",
    "group": "Team",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>User id.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Id of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "number",
            "description": "<p>Number of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "enabled",
            "description": "<p>Wether the Team is enabled to submit evaluations.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "created_at",
            "description": "<p>Creation date of the Team.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Team.php",
    "groupTitle": "Team"
  },
  {
    "type": "get",
    "url": "/team/list",
    "title": "Request Team List",
    "name": "TeamGetList",
    "group": "Team",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "number_start",
            "description": "<p>First team number.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "number_end",
            "description": "<p>Last team number.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "search",
            "description": "<p>Search string.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "teams",
            "description": "<p>List of Teams.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "teams.id",
            "description": "<p>Id of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "teams.name",
            "description": "<p>Name of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "teams.number",
            "description": "<p>Number of the Team.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "teams.enabled",
            "description": "<p>Wether the Team is enabled to submit evaluations.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "teams.created_at",
            "description": "<p>Creation date of the Team.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/Team.php",
    "groupTitle": "Team"
  },
  {
    "type": "delete",
    "url": "/user",
    "title": "Deletes the current User",
    "name": "UserDelete",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>User password.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/user/:id",
    "title": "Request User Information",
    "name": "UserGet",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>User id (if not specified, the current user will be used).</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Id of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "verified_email",
            "description": "<p>Whether the User has verified it's email address.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "enabled",
            "description": "<p>Whether the User is enabled for submiting evaluations.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "created_at",
            "description": "<p>Creation date of the User.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/user",
    "title": "Creates a new User",
    "name": "UserPost",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>User name.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>User email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>User password.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "put",
    "url": "/user",
    "title": "Updates the current User",
    "name": "UserPut",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "name",
            "description": "<p>New User name.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "email",
            "description": "<p>New User email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "password",
            "description": "<p>New User password.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_password",
            "description": "<p>Old User password.</p>"
          }
        ]
      }
    },
    "filename": "C:/projects/scouting/development/application/controllers/User.php",
    "groupTitle": "User"
  }
] });
