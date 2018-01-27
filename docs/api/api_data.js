define({ "api": [
  {
    "type": "post",
    "url": "/auth",
    "title": "Retrieves a new token for the provided credentials",
    "name": "PostAuth",
    "group": "Auth",
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
    "version": "0.0.0",
    "filename": "development/application/controllers/Auth.php",
    "groupTitle": "Auth"
  },
  {
    "type": "get",
    "url": "/user",
    "title": "Request User information",
    "name": "GetUser",
    "group": "User",
    "success": {
      "fields": {
        "Success 200": [
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
    "version": "0.0.0",
    "filename": "development/application/controllers/User.php",
    "groupTitle": "User"
  }
] });
