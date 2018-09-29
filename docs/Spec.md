### Spec

---

### Feature Definitions

[Ability to create user "student" account]()
[Ability to create non-profit organization account]()
[Ability to search for volunteer opportunities]()
[Ability to log time spent volunteering]()
[Ability to generate a "certificate" of time spent volunteering]()

### Sitemap

- Homepage
- Log-In page
- Registration page
- Student profile
- Non-profit organization profile
- Search page

### Interface

---

### Information Architecture

''Using your sitemap as a base structure, use this section to house ALL of your text content. This is a great place to develop all of the content that will appear on your pages, components, and sub sections outside of the constraints of code. In MVC we separate views from controllers and models, while in the Information Architecture section of your project spec you will separate your content from your code.''

### Browser Support

This application is solely a web-site/web-application. Given the increasing use of mobile devices these days, the intention is to support both mobile and desktop devices (via CSS media queries) in order to reach the maximum number of users and fit on their preferred device/browser.

### Infrastructure

---

### Technical Requirements

Technical Requirement - PHP
The site will be predominantly in PHP. Most of my syntax is expected to be compatible going back to PHP 5.2 but, of course, the newer versions of PHP on web servers the better with PHP7 thanks to much better performance.

Define the server software and hardware, virtualized or not, that your application requires to run. These should be in a format of Title: Brief description of my usage. If a feature as defined in the issues requires a specific technology, that issue should cite this as well.

Technical Requirement - MySQL
A MySQL web server is needed for the database operations whether it be MySQL itself or an alternative like MariaDB.

Technical Requirement - Web server
A web server like Apache or Nginx is required for handling the HTTP(S) traffic.

### Programming Languages

[PHP](http://php.net/manual/en/)
[JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[MySQL](https://www.mysql.com/)

### Integrations

[Echarts](https://ecomfe.github.io/echarts-doc/public/en/api.html#echarts)

### Deployment Workflow

Develop on feature branches, after testing and any verification/CI processes complete and pass, then merge to dev/master branches via pull requests.

### Web Host

I will be utilizing a spare web server I have access to, but given the low requirements of essentially a L.A.M.P. server, it should be easy for others to deploy whether being a server, cloud, or other environment meeting the above-mentioned technical requirements criteria.
