#Test exercise for Creditstar Group

As a very first shortlisting procedure of candidates, we have set up a test exercise that the interested applicants are executing.  

We assume that interested applicants would be able to complete the test within a few days. 

Once the test is completed please forward the results to <it.career@creditstar.com>.

## Setup

Install Docker https://www.docker.com/get-started

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
Run database migration (creating tables)

    docker-compose run --rm php yii migrate    
    docker-compose run --rm php tests/bin/yii migrate    
        
You can then access the application through the following URL:

    http://127.0.0.1:8000

## The Solution

1: Created Models, Views, CRUD using Yii2 built in Gii as instructed.
2: Did modifications in codes (MVC) as required.
3: Created Data Migration option that imports user.json & loan.json.
4: UI is similar as your provided Image.
5: Options for: "All Loans", "Create Loan", "All Users", "Create User".
6: Created a function to calculate age using Estonia Personal ID Code (located in views/users/index.php).
7: Displayed age, and eligibility on All Users.
8: Did data binding to display user name in "All Loan" and "Loan Detail" page (extra added to make it cool).
9: Snapshots of working screen are added in "snapshots" folder.
10: If anything, please write back to me at nitin@npkgroups.com 
