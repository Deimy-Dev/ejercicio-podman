// app.js
const http = require('http');
const port = 3000;
const chistes = [
  "¿Por qué el programador no salió con la chica? Porque tenía demasiados bugs.",
  "¿Qué le dice un bit a otro bit? Nos vemos en el bus.",
  "¿Cuál es el café más peligroso del mundo? El ex-preso.",
  "Un hijo le preguntó a su padre (un programador) por qué el sol sale por el este y se pone por el oeste. ¿Su respuesta? ¡Funciona, no lo toques!",
  "El  software, las iglesias y las catedrales son muy parecidos: primero los construimos, luego rezamos",
  "Copiar y pegar fue programado por programadores para programadores en realidad."
];

http.createServer((req, res) => {
  const random = Math.floor(Math.random() * chistes.length);
  res.writeHead(200, { "Content-Type": "application/json" });
  res.end(JSON.stringify({ chiste: chistes[random] }));
}).listen(port, () => console.log(`Servidor de chistes en ${port}`));
