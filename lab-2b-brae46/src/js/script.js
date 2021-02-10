

class Task {
    constructor({ text, date, done, id }) {
        this.text = text
        this.date = date
        this.done = done
        this.id = id
    }
    toHTML() {
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
    }
    toggle() {
         this.done = !this.done;   
    }
}

let tasks = []

function readStorage() {
    //reads the data from local storage
    let jsonString = localStorage.getItem('database');
    
    //converts the string back into an object to use on the DOM
    let result = JSON.parse(jsonString) || [];
    //the [] is used in case the database is not set up 
    //to avoid throwing an error
    
    //this last line is a higher-order function. By using .map()
    //takes all the data and ensures it is convereted to objects
    result = result.map(taskData => new Task(taskData));
    
    return result;// ... read from the local storage
}

function updateStorage(newData) {
    //sets JSON object to a string
    let jsonString = JSON.stringify(newData);
    //sents the string into the database
    localStorage.setItem('database', jsonString);
    // ... update the local storage
}
function createTask() {
    if(document.getElementById("inputText").value != "" && document.getElementById("inputDate").value != "" ){
        console.log("Made it boi")
        tasks = readStorage();
        let textInput = encodeHTML(document.getElementById("inputText").value);
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
function readTasksCopy(tasksCopy) {
    document.getElementById("list").innerHTML = ""
    tasksCopy.forEach(task => {
        document.getElementById("list").innerHTML += task.toHTML();
    })
    console.log("i read tasksCopy");
}
function updateTask(id) {
    console.log("Made to Update")
    tasks = readStorage();
    tasks.find(task =>task.id === id).toggle();
    //tasks[updatedIndex].toggle();
    console.log(tasks)
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
function dateSort(){
    if(document.getElementById("customSwitch1").checked){
        tasks = readStorage();
        const tasksCopy = [...tasks];
       //tasksCopy.sort();
        //tasksCopy.reverse();
        tasksCopy.sort((a, b) => (a.date > b.date) ? 1 : -1); 
        console.log(tasksCopy, "i sorted"); //it sorts correctly but doesnt display on actual list
        console.log(tasks, "og"); //we know it wont affect original array
        readTasksCopy(tasksCopy);
    }
    else{
        readTasks();
    } 
}
function hideSort(){
    if(document.getElementById("customSwitch2").checked){
        tasks = readStorage();
        const tasksCopy = [...tasks];
        console.log("before hide")
        for(let i = 0; i < tasksCopy.length; ++i){//for loop that runs through tasksCopy and if statement for if done = true then delete otherwise skip
            if(tasksCopy[i].done == true){ //issue how do i get it to check if task done = true or false?
                tasksCopy.splice(i, 1);  
            }
        }
        console.log(tasksCopy, "i sorted"); //it sorts correctly but doesnt display on actual list
        console.log(tasks, "og"); //we know it wont affect original array
        readTasksCopy(tasksCopy);
        
    }
    else{
        readTasks();
    }
      
    
}
function encodeHTML(textString) {
    return textString.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
}




