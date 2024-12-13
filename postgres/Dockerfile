FROM postgres:latest

# Copy the SQL script to the Docker image
COPY ./init.sql /docker-entrypoint-initdb.d/

# Set permissions for the script
RUN chmod 644 /docker-entrypoint-initdb.d/init.sql
