# NFQ Symfony Test
Symfony article web application task

## Task
1. Add a new Article entry so the Listing Page has 6 Articles
- Update Data Fixtures
2. Implement “Edit” functionality for an Article
  - Implement a new Edit Page with a new route
  - Implement a new Symfony Form for the Article
  - The user should be able to change the title, text & image of an Article
  - Editing results are persisted in the database
  - Add a new “Edit” button in the Listing Page
  - Optional eequirements:
    - Add a new datetime “updated at” field that automatically updates after every edit
    - Sort articles in the listing page based on the “updated at” field: newly updated articles should be first
3. Implement “X” minutes to read functionality.
  - Implement an algorithm to find how long any given text will be read in minutes: 
    1. Count all words in a text that have more than 3 letters.
    2. Divide it by the 200 (the average readers’ words per minute)
    3. Round up the number to get a nice value.
  - Change all occurrences of “X min” in the Application to the actual value.
  - Optional requirements:
    - Write a Unit Test for the Algorithm
