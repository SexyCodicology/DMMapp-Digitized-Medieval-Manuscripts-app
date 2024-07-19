# DMMapp Monitoring System

The DMMapp uses two systems to check the status of the application and report it to the users:

1. [Statuspage by Atlassian](https://www.atlassian.com/software/statuspage)
2. [UptimeRobot](https://uptimerobot.com/)

## Overview

The DMMapp monitoring system is designed to provide users with up-to-date information about the application's status.
This system comprises a frontend component and a backend component, working together to ensure accurate status
reporting.

### Statuspage by Atlassian

Statuspage is the frontend of the monitoring system. It is the page that users will see when they want to check the
status of the application.

- **Functionality**: Displays the current status and historical uptime data of the application.
- **User Interface**: Provides a user-friendly interface for users to view status updates and subscribe to
  notifications.
- **Limitations**: Does not automatically check the status of the added applications.

### UptimeRobot

UptimeRobot is the backend of the monitoring system. It checks the status of the application and reports it to the
Statuspage.

- **Functionality**: Monitors the application at regular intervals and detects any downtime or issues.
- **Integration**: Reports the status data to Statuspage, which then displays the information to the users.
- **Monitoring**: Can be configured to monitor various endpoints and services associated with the application.

## Workflow

1. **Monitoring by UptimeRobot**: UptimeRobot continuously monitors the DMMapp and the Blog.
   - Checks are performed at predefined intervals.
   - Any downtime or issues are detected and recorded.

2. **Reporting to Statuspage**: UptimeRobot reports the status to Statuspage.
   - Status updates are sent to Statuspage.
   - Statuspage displays the current status and any incidents.

3. **User Notification**: Users access Statuspage to view the application's status.
   - Users can subscribe to updates and notifications.
   - Statuspage provides a historical view of the application's uptime and incidents.

## Summary

The combination of Statuspage and UptimeRobot ensures that the DMMapp monitoring system is both robust and
user-friendly. Statuspage serves as the visible interface for users, while UptimeRobot performs the essential task of
monitoring the application's health and reporting it accurately.