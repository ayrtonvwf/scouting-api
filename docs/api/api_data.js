define({ "api": [
  {
    "type": "post",
    "url": "/auth",
    "title": "Retrieves a new token for the provided credentials",
    "name": "PostAuth",
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
    "name": "RenewAuth",
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
    "url": "/team/:id",
    "title": "Request Team information",
    "name": "GetTeam",
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
    "name": "GetTeamsList",
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
    "type": "get",
    "url": "/user/:id",
    "title": "Request User Information",
    "name": "GetUser",
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
  }
] });
