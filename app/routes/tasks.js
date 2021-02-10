const express = require(`express`)
const router = express.Router()

const Task = require(`../models/Task`)

/**
 * GET: Returns one task with the task's id specified in the path
 */
router.get(`/:id`, async (req, res) => {
	try {
		const task = await Task.findById(req.params.id)
		if (!task) res.status(404).send(`Task with ID ${req.params.id} does not exist.`)
		else res.status(200).send(task)
	} catch (error) {
		console.error(error)
		res.status(500).send(`Something went wrong.`)
	}
})
router.post('/', async (req, res) => {//CREATE
	try {
		if(req.body.Text == "" || req.body.Date == "") res.status(500).send(`Something went wrong.`)
		else{
			let newTask = new Task(req.body)
			newTask.UserId =  req.user.Id
			newTask.Done = false
			let savedTask = await newTask.save()
			res.status(201).send(savedTask)
		}
	} catch (error) {
		console.error(error)
		res.status(500).send(`Something went wrong.`)
	}
})
// Make an asynchronous request using Mongoose to .save() the new task, and save the results in a variable
// Use the res variable to .send() the result back to the requester with a 201 status (Created)


router.get(`/`, async (req, res) => {//READ
	try {
		//if (req.document.cookie == "")res.status(500).send(`Something went wrong.`)
		//const task = await Task.find({UserId:req.user.Id})
		var temp = req.user.Id
		const result = await Task.find({"UserId": temp}).exec()
		res.send(result)
	} catch (error) {
		console.error(error)
		res.status(500).send(`Something went wrong.`)
	}
})

// Use the Task class to .find() all of the tasks
// Use the res object to .send() the tasks back to the client

router.put('/:id', async (req, res) => {//UPDATE
	try{
		//const task = await Task.findById(req.params.id)	
		let re = new RegExp("^[a-fA-F0-9]{24}$");
		
		if(!re.test(req.params.id)) res.status(500).send(`Task ID not valid.`)
		else{
			const task = await Task.findById(req.params.id)
			if(!task) res.status(404).send(`Task with ID ${req.params.id} does not exist.`)
			else{
				task.set(req.body)	
				let savedTask = await task.save()
				res.status(200).send(savedTask)
			}
		}
	}catch (error) {
		console.error(error)
		res.status(500).send(`Something went wrong.`)
	}
}) 
// Use the Task class to update the task
// Use the res object to .send() the task back to the client

router.delete('/:id', async (req, res) => {
	try{	
		//const task = await Task.findById(req.params.id)
		let re = new RegExp("^[a-fA-F0-9]{24}$");
		if(!re.test(req.params.id)) res.status(500).send(`Task ID not valid.`)
		else{
			const task = await Task.findById(req.params.id)
			if (!task) res.status(404).send(`Task with ID ${req.params.id} does not exist.`)
			else {
				await task.delete()
				res.send(`Task deleted.`)
			}
		}
	}catch (error) {
		console.error(error)
		res.status(500).send(`Something went wrong.`)
	}
})
//DELETE
// Use the Task class to delete the task
// Use the res object to .send() a message back to the client


module.exports = router