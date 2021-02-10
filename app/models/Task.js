/*

This file is for creating a Mongoose Model/Schema

*/

const { Schema, model } = require("mongoose");

const taskSchema = new Schema({
  UserId:  String, // String is shorthand for {type: String}
  Text: String,
  Done:   Boolean,
  Date: String,
});

const Task = model('Tasks', taskSchema);
const schema = new Schema();

// schema.path('_id');
// const Model = mongoose.model('Test', schema);

// const doc = new Model();
// doc._id instanceof mongoose.Types.ObjectId; // true

module.exports = Task;
