
### Three Level Security (User authentication)

## Table of contents

  - [Project description](#project-description)
  - [Project analysis](#problem-analysis)
  - [Program Design](#program-design)
 


**Project Description:**

![23qtg3hvggm0gux8nu0v](https://user-images.githubusercontent.com/53684246/142770280-fb007224-6cb3-4516-9c12-337b2c086cd6.jpeg)


Most of nowadays applications prioritize availability over security. A simple user name, a password, and data can be accessed, no matter how sensible they are. Techniques like cryptography and hashing have been used to try and keep those passwords secure from any adversary, but attacks like online and offline dictionary attacks have seen those security measures broken. And if broken then your everything can be accessed. For a system that requires a lot of security, there is a need for more security when we talk about authentication. In this project three-layer authentication security system will be designed.


**Project Description:**

A password-guessing attack known as a brute force attack is a common issue that web developers confront. A brute-force attack is a method of attempting to crack a password by trying every possible combination of letters, numbers, and symbols until you find the one that works.
This login page has no safeguards against password guessing attacks (brute force attacks). One way to counter this is by implementing the number of attempt checking when logging and blocking when these numbers of attempt reach the threshold value of failed attempt.

**Program Design:**

1. Have a unique code given to the user by the system administrator, the code is a one time use and will not work when used twice for the same purpose. The code will be asked by the system during the registration process

2. During the registration the user will be asked to code the following details:
   * A unique username (not already existing in the system)
   * A password (At least 8 characters with one uppercase, lowercase and symbols, numbers) the password is stored after being hashed as SHA1
   * A passphrase with at least 16 characters with white spaces, upper cases, numbers, it’s also stored after being hashed as md5
   * Three different numbers ranging from 1 to 9
   * The confirmation code mentioned above
   
3. Upon successful registration the user can login and and access the system services

   * First the user will need to give the username and correct password, upon success the user will be redirected to page that ask for the user’s passphrase. If the username and password(hashed password) do not match the number of failed attempt will incremented by 1 ( if the failed attempts are equal or above 3, this user will be temporary blocked)
   * The concept of passphrase is the same as the one for the password but upon failure the user will need to renter the password to access the passphrase page again (the number of attempter will be recorded and increased at each failure)
   * Upon success on the passphrase page, the user will access the image page.
 
In the database there will be 40 different images that will be chosen randomly each time a user arrives on the image pages the user will be presented with 10 different images chosen randomly, such images will be accompanied with a number.

Let n be the number associated to the image, there will be 10 of them, 7 number will be randomly generated ranging from 0 to 9 and the other 3 are the ones linked to the user. The seven numbers will be kept in an array, after which the other will be pushed in the said array at the back.

When storing n (during registration), they will be encrypted with the following algorithm:


**Conclusions:**

* General correlation over all years is weaker than individual years
* Moderate positive correlation for several mortality categories
* Correlations between ethanol consumption and mortality rates associated with cirrhosis and mental/substance use moderate over multiple years
* Ethanol consumption in the US has changed over the years analyzed - curious drop in consumption from 1980 to 1995
* Negative correlations between ethanol consumption and mortality rates associated with cardio and diabetes

In the database there will be 40 different images that will be chosen randomly each time a user arrives on the image pages the user will be presented with 10 different images chosen randomly, such images will be accompanied with a number.

Let n be the number associated to the image, there will be 10 of them, 7 number will be randomly generated ranging from 0 to 9 and the other 3 are the ones linked to the user. The seven numbers will be kept in an array, after which the other will be pushed in the said array at the back
When storing n (during registration), they will be encrypted with the following algorithm:
 
 
 


**Group member:** Rosali Gonzalez



