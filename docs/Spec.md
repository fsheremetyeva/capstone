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

  - [ ] Update email
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
- Search page

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
    - Email
    - Zip code
    - Association
    - Image

  - Add a new volunteer record:
    - Date
    - Organization Name
    - Time
    - Notes

  - View volunteer history
  - View summary of volunteer data in a graph/pie chart
  - Generate a certificate


- Non-profit organization Dashboard

  - Add/Edit Volunteer Opportunity
    - Name
    - Location
    - Date(s)
    - Times
    - Description
    - Images

  - Delete Opportunity

- Search page

  - View available listings
    - Image
    - Organization Name
    - Excerpt of the volunteer Opportunity
    - "Learn More" button

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

[Echarts](https://ecomfe.github.io/echarts-doc/public/en/api.html#echarts)

### Deployment Workflow

Develop on feature branches, after testing and any verification/CI processes complete and pass, then merge to dev/master branches via pull requests.

### Web Host

I will be utilizing a spare web server I have access to, but given the low requirements of essentially a L.A.M.P. server, it should be easy for others to deploy whether being a server, cloud, or other environment meeting the above-mentioned technical requirements criteria.
