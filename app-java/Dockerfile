FROM docker.io/library/openjdk:17
COPY HelloWorld.java /HelloWorld.java
RUN javac /HelloWorld.java
CMD ["java", "-cp", "/", "HelloWorld"]
