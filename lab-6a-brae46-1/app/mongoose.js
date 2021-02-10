/*

This file is for initializing mongoose

*/

// const mongoose = require('mongoose');
// mongoose.connect('mongodb:process.env.ATLAS_CONNECTION_STRING', {
//     useNewUrlParser: true,
//     useUnifiedTopology: true,
//     useFindAndModify: false,
//   });

// const db = mongoose.connection;
// db.on('error', console.error.bind(console, 'connection error:'));
// db.once('open', function() {
//   console.log("we're connected")
// });

const { connect } = require('mongoose')
connect(process.env.ATLAS_CONNECTION_STRING,  
    {    
    useNewUrlParser: true,    
    useUnifiedTopology: true,    
    useFindAndModify: false  
    },
    (err) => {
        if (err) console.error(err)   
        else console.info('Database Connected')  
    })

