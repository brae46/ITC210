# Lab-6-Boilerplate
Starter Files for lab 6

### `GET /api/v1/auth/google`
#### Description (purpose) 
This is the path that is used to log in. This will redirect users to the Google authentication page. This requires not body but will return the user who logs in. 

| Parameter | Description |
| --------- | ----------- |
| N/A       | N/A         |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
n/a

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        "_id": "5fc6f09a2a21ab609d1e3c3c",
        "Text": "74c3a70bac",
        "Date": "2016-09-04T00:00:00.000Z",
        "UserId": "bobbyflay",
        "Done": false,
        "__v": 0
    }
     ```

### `GET /api/v1/auth/logout`
#### Description (purpose) 
This is the path used to log users out. This does not require anything but will send the users information when requested. 

| Parameter | Description |
| --------- | ----------- |
| N/A       | N/A         |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
n/a

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        "_id": "5fc6f09a2a21ab609d1e3c3c",
        "Text": "74c3a70bac",
        "Date": "2016-09-04T00:00:00.000Z",
        "UserId": "bobbyflay",
        "Done": false,
        "__v": 0
    }
     ```

### `GET /api/v1/tasks`
#### Description (purpose) 
This is the base url. This is the place users end up if they do not add anything to the url. This reads the tasks of the user and is the home page after the user logs in. The response is the user's information.

| Parameter | Description |
| --------- | ----------- |
| N/A       | N/A         |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
n/a

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        "_id": "5fc6f09a2a21ab609d1e3c3c",
        "Text": "74c3a70bac",
        "Date": "2016-09-04T00:00:00.000Z",
        "UserId": "bobbyflay",
        "Done": false,
        "__v": 0
    }
     ```

### `GET /api/v1/tasks/:id`
#### Description (purpose) 
This path is used to get a specific task id from the user. This will either return the specific task associated with the id or state that the task id does not exist.

| Parameter | Description |
| --------- | ----------- |
| N/A       | N/A         |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
n/a

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        Task with ID 5fc6c94c9a4ce34bff51b13e does not exist.
     }
     ```


### `POST /api/v1/tasks`
#### Description (purpose) 
This is the base path with the POST request is used to create tasks. The body includes the data found in the task model. The id is generated but the user is able to set the text and date. If one of these fields are empty the task will not create. 

| Parameter | Description                        |
| --------- | -----------                        |
| Text      | This is the contents of the task   |
| Date      | This is the date selected for task |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
    
    ```{
        "Text": "this is cool",
        "Date": "01/15/2020"
    }
     ```

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        "_id": "5fc6f09a2a21ab609d1e3c3c",
        "Text": "this is cool",
        "Date": "2016-01-15T00:00:00.000Z",
        "UserId": "bobbyflay",
        "Done": false,
        "__v": 0
    }
     ```
### `PUT /api/v1/tasks/:id`
#### Description (purpose) 
This is the base url with the HTTP PUT request. This request allows users to update their task. With the "task.set()" they are able to update any aspect of their task that they would like to change. All parameters are OPTIONAL.

| Parameter | Description                                      |
| --------- | -----------                                      |
| Text      | This is the contents of the task                 |
| Date      | This is the date selected for task               |
| Done      | This marks the status of the task                |
| UserId    | This changes the UserId associated with the task |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
 
   ```  {
        "Text": "spaghetti is cool",
        "UserId": "ponyBoi",
        "Done": true
    }
  ```
#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
        "_id": "5fc6f09a2a21ab609d1e3c3c",
        "Text": "spaghetti is cool",
        "Date": "2016-09-04T00:00:00.000Z",
        "UserId": "ponyBoi",
        "Done": false,
        "__v": 0
    }
     ```
### `DELETE /api/v1/tasks/:id`
#### Description (purpose) 
This is the base url with the DELETE HTTP request. This request takes in a task id and will delete it from the user's task list. This has no body request but will send the task id as identification for deletion.

| Parameter | Description |
| --------- | ----------- |
| N/A       | N/A         |

#### Request Body JSON Example (if applicable) in a markdown multiline code block, with syntax highlighting
n/a

#### Response Body JSON Example in a markdown multiline code block, with syntax highlighting

     ```  {
       Task Deleted
    }
     ```
    

    







