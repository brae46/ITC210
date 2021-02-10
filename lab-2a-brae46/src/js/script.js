

class Task {
    constructor({ text, date, done, id }) {
        // HINT This method is the constructor. In C++, this would be
        // the Task() method. The curly braces inside the constructor is // a JavaScript syntax that is called 'deconstruction'. This
        // means the constructor will ask for an object
        // (`{i: 'am', an: 'object'}`) with the parameters `text`,
        // `date`, `done`, and `id`. This will make it easier to
        // convert it from the local storage database we will set up.
        this.text = text
        this.date = date
        this.done = done
        this.id = id
    }
    toHTML() {
        // TODO: Fill out this method. It should return a string version
        // of this task, including an `<li>` tag and all of the
        // Bootstrap components to make it look pretty. It should
        // display the `text`, `date`, and `done` property of this
        // Task. It should also have two listeners, which call the
        // update and delete function, with this Task's `id` as a
        // parameter.
        //var taskData = ({ text, date, done, id });
        return`
        <li id = ${this.id} class= "list-group-item">          
            <span id= squarebox class="material-icons" onclick="updateTask(${this.id})">${this.done ? "check_box" : "crop_square"} </span>
            <span class= "testtext">${this.done ? `<strike>${this.text}</strike>` : this.text}</span>
            <span id= removebutton class="material-icons" onclick="deleteTask(${this.id})">remove_circle</span>
            <span class= "testdate">${this.prettyDate()}</span>
        </li>
        `
        
    }
    prettyDate() {
        let inputDate = new Date(this.date);
        let dateString = JSON.stringify(inputDate);
        return  dateString.charAt(6) + dateString.charAt(7) + "/" + dateString.charAt(9) + dateString.charAt(10) + "/" + dateString.charAt(1) + dateString.charAt(2)+ dateString.charAt(3) + dateString.charAt(4); 
        // TODO: Fill out this method. It should return the date in our
        // locale's format, 'MM / DD / YYYY', instead of the
        // easily-sortable international standard, 'YYYY-MM-DD'.
    }
    toggle() {
         this.done = !this.done;   
            //leave it as an unchecked box
    }
        // TODO: Fill out this method. It should flip this Task's `done`
        // property from `true` to `false`, or from `false` to `true`.
}

let tasks = []

function readStorage() {
    let jsonString = localStorage.getItem('database');
    let result = JSON.parse(jsonString) || [];
    result = result.map(taskData => new Task(taskData));
    
    return result;// ... read from the local storage
}

function updateStorage(newData) {
    let jsonString = JSON.stringify(newData);
    localStorage.setItem('database', jsonString);
    // ... update the local storage
}
function createTask() {
    if(document.getElementById("inputText").value != "" && document.getElementById("inputDate").value != "" ){
        console.log("Made it boi")
        tasks = readStorage();
        let textInput = document.getElementById("inputText").value;
        let dateInput = document.getElementById("inputDate").value;

        let newTask = new Task({
            text: textInput,
            done: false,
            date: dateInput,
            id: Date.now() 
        })
        tasks.push(newTask);
        // TODO: Pull in form data from DOM
        updateStorage(tasks);
        readTasks();
        document.getElementById("inputText").value = ""
        document.getElementById("inputDate").value = ""
        localStorage.setItem('text', "");
        localStorage.setItem('date', "");
    }
}
function readTasks() {
    tasks = readStorage();
    document.getElementById("list").innerHTML = ""
    tasks.forEach(task => {
        document.getElementById("list").innerHTML += task.toHTML();
    })
}
function updateTask(id) {
    console.log("Made to Update")
    tasks = readStorage();
    tasks.find(task =>task.id === id).toggle();
    //tasks[updatedIndex].toggle();
    console.log(tasks)

    //document.getElementById("list").innerHTML
    // TODO: Update the task in `tasks` array
    // TODO: Save to local storage
    // TODO: Make the DOM update
    updateStorage(tasks);
    readTasks();

}
function deleteTask(id) {
    tasks = readStorage();
    let deleteIndex = tasks.findIndex(task => task.id === id);
    console.log("Delete Index:", deleteIndex)
    console.log("Before:", tasks)
    let spliced = tasks.splice(deleteIndex, 1);
    console.log("Spliced:", spliced);
    console.log("After:", tasks);
    updateStorage(tasks);
    readTasks();
    // TODO: Delete task from `tasks` array
    // TODO: Save to local storage
    // TODO: Make the DOM update
}
function captureText(newData) {
    localStorage.setItem('text', newData);
    // ... update the local storage
}
function captureDate(newData) {
    localStorage.setItem('date', newData);
    // ... update the local storage
}

 function storeCurrentState(){
    localStorage.setItem('text', document.getElementById('inputText').value)
    localStorage.setItem('date', document.getElementById('inputDate').value)

}
function checkInput(){
        document.getElementById("inputText").value = localStorage.getItem("text");
        
    
}
function checkDate(){
        document.getElementById("inputDate").value = localStorage.getItem("date");
}
 
// onload="function(${this.id})"
//     let textInput = document.getElementById("inputText").value;
//     if(textInput !== ""){
        
//     }
// }
// function inputDCapture (){
//     let dateInput = document.getElementById("inputDate").value;
// }

// if(

// )

