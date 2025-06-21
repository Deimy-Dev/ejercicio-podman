// HelloWorld.java
import com.sun.net.httpserver.*;
import java.io.*;
import java.net.*;
import java.time.*;

public class HelloWorld {
  public static void main(String[] args) throws IOException {
    HttpServer server = HttpServer.create(new InetSocketAddress("0.0.0.0", 8080), 0);
    server.createContext("/", new EdadHandler());
    server.setExecutor(null);
    server.start();
    System.out.println("Servidor Java en 8080");
  }

  static class EdadHandler implements HttpHandler {
    public void handle(HttpExchange t) throws IOException {
      String query = t.getRequestURI().getQuery(); // ?nacimiento=2000
      int nacimiento = Integer.parseInt(query.split("=")[1]);
      int edad = Year.now().getValue() - nacimiento;
      String response = "{\"edad\": " + edad + "}";
      t.getResponseHeaders().add("Content-Type", "application/json");
      t.sendResponseHeaders(200, response.length());
      OutputStream os = t.getResponseBody();
      os.write(response.getBytes());
      os.close();
    }
  }
}
