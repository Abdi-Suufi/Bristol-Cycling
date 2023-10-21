const http = require('http');
const mysql = require('mysql');

const connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    port: '3306',
    password: '',
    database: 'cycle_shop',
});

connection.connect(err => {
    if (err) {
        console.error('Error connecting to the database: ' + err.stack);
        return;
    }
    console.log('Connected to the database as ID ' + connection.threadId);
});

const server = http.createServer((req, res) => {
    if (req.url === '/getdata') {
        const QUERY = 'SELECT * FROM `cycle_shop`';

        connection.query(QUERY, (err, results) => {
            if (err) {
                console.error('Error executing the query: ' + err);
                res.writeHead(500, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ error: 'An error occurred while fetching data from the database.' }));
            } else {
                res.writeHead(200, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify(results));
            }
        });
    }
});

const PORT = 3306; // Use the port you prefer
server.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
