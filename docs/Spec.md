### Spec

---

### Feature Definitions

[Filter of GitHub Features](https://github.com/fsheremetyeva/capstone/labels/Feature)

- Ability to create user volunteer account
  - As a new site visitor I'm able to create a volunteer account and have this information stored on the service's database.
  - [ ] Volunteer Registration / Sign Up Form
    - [ ] Name
    - [ ] Email
    - [ ] Password     
- Ability to create non-profit organization account
  - As a non-profit organization we're able to join your service and organize our volunteer needs.
  - [ ] Organization Registration / Sign Up Form
    - [ ] Name
    - [ ] Email
    - [ ] Password    
- Ability to search for volunteer opportunities
  - As a user seeking volunteer work, I can find volunteer opportunities fitting specific criteria:
    - [ ] Search by Region
    - [ ] Search by Organization
- Dashboard for volunteer account
  A user is able to add/edit and delete information:

  - [ ] Update Password
  - [ ] Add/Modify/Remove Capabilities
  - [ ] Add new contact information
  - [ ] Remove contact information
  - [ ] Modify contact information
  - [ ] Volunteer History

  Other Features:
  - [ ] Pie chart summarizing volunteer activity
  - [ ] Generate Certificate

- Initial Dashboard for non-profit account
  As an organization I am able to create and manage volunteer listings:

  I can add or update volunteer opportunities:

  - [ ] Add/Edit Volunteer Opportunity
  - [ ] Name
  - [ ] Location
  - [ ] Date(s)
  - [ ] Times
  - [ ] Description
  - [ ] Images

  - [ ] Delete Opportunity

- Ability to log time spent volunteering

  As a volunteer, I can claim time spent volunteering.

- Ability to generate a "certificate" of time spent volunteering

  As a volunteer, I can print and/or share earned certificates as proof of volunteer work.

### Sitemap

- Homepage
- Log-In page
- Registration page
- Student Dashboard
- Non-profit organization Dashboard
- Settings page
- Search page
- Opportunity Details / Contact Organization


### Interface

---

### Information Architecture

- Homepage

  - Search for volunteer opportunities
  - Learn more about the application

- Log-In page

  - Login as a user and get access to the Volunteer Dashboard
  - Login as an organization and get access to the Organization Dashboard

- Registration page

  - Register as a volunteer
  - Register as an organizations

- Volunteer Dashboard

  - Add/Edit/Delete personal information:
    - Name
    - Zip code
    - Association
    - Image

  - Add a new volunteer record:
    - Date
    - Organization Name
    - Time(Duration)
    - Notes

  - View volunteer history
  - View summary of volunteer data in a graph/pie chart
  - Generate a certificate


- Non-profit organization Dashboard

  - Add/Edit/Delete organizaiton information:
    - Name
    - Address
    - Zip code
    - Description
    - Image

  - Add/Edit Volunteer Opportunity
    - Title
    - Date/Time
    - Description

  - Delete Opportunity

- Search page

  - View available listings
    - Image
    - Organization Name
    - Excerpt of the volunteer Opportunity
    - Date/Time
    - "Learn More" button

- Opportunity Details / Contact Organization
    - Organization name
    - Image
    - Description
    - All available opportunities
    - Contact button

### Browser Support

This application is solely a web-site/web-application. Given the increasing use of mobile devices these days, the intention is to support both mobile and desktop devices (via CSS media queries) in order to reach the maximum number of users and fit on their preferred device/browser.

### Infrastructure

---

### Technical Requirements

Technical Requirement - PHP

The site will be predominantly in PHP. Most of my syntax is expected to be compatible going back to PHP 5.2 but, of course, the newer versions of PHP on web servers the better with PHP7 thanks to much better performance.

Technical Requirement - MySQL

A MySQL web server is needed for the database operations whether it be MySQL itself or an alternative like MariaDB.

Technical Requirement - Web server

A web server like Apache or nginx is required for handling the HTTP(S) traffic.

### Programming Languages

- [PHP](http://php.net/manual/en/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [MySQL](https://www.mysql.com/)

### Integrations

[Chart.js](http://www.chartjs.org/) is used for generating a pie chart of the time use spends volunteering for different organizations.

[FPDF](http://fpdf.org/) is used to generate a certificate showing the time and organizations the user volunteered for.

### Deployment Workflow

Develop on feature branches, after testing and any verification/CI processes complete and pass, then merge to dev/master branches via pull requests.

### Automation

The automated deployment of GitHub updates to the test/production server is handled via GitHub web hooks with [Git-Deploy](https://github.com/vicenteguerra/git-deploy). Git-Deploy is a nice PHP based solution I discovered when researching deployment strategies and was quite simple to understand its code/design.

Git-Deploy is placed on the server and has a basic configuration file for specifying the Git URL, desired branch, and other parameters. These parameters are nicely documented by the project's [README](https://github.com/vicenteguerra/git-deploy/blob/master/README.md).

After configuring Git-Deploy, it had to be setup from the GitHub web hooks page to make a request to the URL of the `deploy.php` file for initiating the update process on commits. From there when making new commits to the respected branch, it updates on the server.

GitHub upon having new commits will automatically call the deploy script on that server. The git-deploy script will clone/pull the latest changes to the server so that it's immediately acc

### Web Host

This website will be deployed using Linux / L.A.M.P. server.
