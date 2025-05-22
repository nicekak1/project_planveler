const express = require('express');
const app = express();
const port = 3000;

// Middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Endpoint รองรับ ANY method
app.all('/api/test', (req, res) => {
  const method = req.method;
  const input = req.body.value || req.query.value || "none";

  // Echo response ที่จะถูก CxOne ตรวจเจอเป็น reflected XSS หรือข้อมูลรั่ว
  res.send(`<h1>Method: ${method}</h1><p>You sent: ${input}</p>`);
});

// Start server
app.listen(port, () => {
  console.log(`API server running at http://localhost:${port}`);
});
