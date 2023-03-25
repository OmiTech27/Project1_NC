const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 80;

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'root',
  database: 'ncdb',
  port: 4444
});

connection.connect();

app.use(express.urlencoded({ extended: false }));
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});
app.post('/submit', (req, res) => {
  const { fname, lname, Course, email, password } = req.body;

  const query = `INSERT INTO ncclasses (fname, lname, Course, email, password) VALUES (?, ?, ?, ?, ?)`;
  const values = [fname, lname, Course, email, password];

  connection.query(query, values, (err, results) => {
    if (err) throw err;

    res.send('Message submitted successfully!');
  });
});

app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});
