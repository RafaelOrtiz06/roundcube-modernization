# Use the official PHP image as the base image
FROM php:8.1-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy the Laravel API files into the container
COPY . .

# Expose port 8000 to access the API
EXPOSE 8000

# Create a custom entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the entrypoint to run the custom script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
