# Use the Poste.io base image
FROM analogic/poste.io:latest

# Copy the custom Dovecot configuration to the container
COPY dovecot.conf /etc/dovecot/conf.d/99-custom-config.conf

# Expose the required ports
EXPOSE 25 143 587 993 4190

# Set the environment variable for timezone
ENV TZ=America/New_York
