
### Three Level Security (User authentication)

![1*WAcdzLOmJLDYkXxuCKq4Xw](https://user-images.githubusercontent.com/53684246/142771551-2db13e54-eb45-458b-806b-18d17f725f41.jpeg)

[Cryptography](https://www.kaspersky.com/resource-center/definitions/what-is-cryptography) is the study of secure communications techniques that allow only the sender and intended recipient of a message to view its contents. The term is derived from the Greek word kryptos, which means hidden. It is closely associated to encryption, which is the act of scrambling ordinary text into what's known as ciphertext and then back again upon arrival. In addition, cryptography also covers the obfuscation of information in images using techniques such as microdots or merging. Ancient Egyptians were known to use these methods in complex hieroglyphics, and Roman Emperor Julius Caesar is credited with using one of the first modern ciphers.

When transmitting electronic data, the most common use of cryptography is to encrypt and decrypt email and other plain-text messages. The simplest method uses the symmetric or "secret key" system. Here, data is encrypted using a secret key, and then both the encoded message and secret key are sent to the recipient for decryption. The problem? If the message is intercepted, a third party has everything they need to decrypt and read the message. To address this issue, cryptologists devised the asymmetric or "public key" system. In this case, every user has two keys: one public and one private. Senders request the public key of their intended recipient, encrypt the message and send it along. When the message arrives, only the recipient's private key will decode it — meaning theft is of no use without the corresponding private key.


## Table of contents

  - [Requirement & Functionality](#requirement-functionality)
  - [Project Description](#project-description)
  - [Project Analysis](#problem-analysis)
  - [Program Design](#program-design)
  - [Process Description](#process-description)
  
  
**Requirements & Functionality:**

## Install the webserver 
	Xamp was tested and worked well 
## Install mysql database 
	This is also given in the Xamp setup (Php myadmin )
Create the database using the file given by running the php files,  db and create  alternatively the myql file can be put in the myql folder of the dabase
Copy the htdocs in the webserver folder to be served



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

Let n be the number associated to the image, there will be 10 of them, 7 number will be randomly generated ranging from 0 to 9 and the other 3 are the ones linked to the user. The seven numbers will be kept in an array, after which the other will be pushed in the said array at the back
When storing n (during registration), they will be encrypted with the following algorithm:
 
 
 <img width="966" alt="Screen Shot 2021-11-21 at 11 33 25 AM" src="https://user-images.githubusercontent.com/53684246/142770854-0a3fbc13-1886-424e-b55d-8bc45135d6bb.png"> 

The e(n) will be the one being stored into the database appended with the sha1 value of the image name computed, upon retrieval, the numbers will be sent in the form of e(n), be decrypted and pushed into the array.

The user will then choose every images to where the 3 numbers appear, sha1 of the each corresponding image is also computed and stored in the database together with the number appended to it as string, note that the numbers are the main subject together with the images.

The number selected will be put in an array. The array will then have all its member encrypted with the defined algorithm and the appended string of the sha1 of the image then a generated random one time nonce will be added to each member of the encrypted array. The array will then be compared for similarity with the array containing the 3 encrypted numbers in the database corresponding to the user( the nonce will be added to them too ) if there is similarity (100%) the user will be allowed in; or else he will be redirected to the password page and the number of failed attempt will be incremented by 1 (when the number of attempts reach 3 or above the account will be blocked).

The password and passphrase will be stored in hashed form and timestamp will used to verify if the password or passphrase is being replayed (<3 minutes)
The database will have two tables, table user and table images.

```
User table
Username : it’s a varchar in the database,
password : varchar
passphrase: text
number1: int ; number2: int; number3: int
attempted: int
timestamp: time
```
```Image table
Image ID: int
Image name: varchar
Image: path
```

<img width="588" alt="Screen Shot 2021-11-21 at 11 48 24 AM" src="https://user-images.githubusercontent.com/53684246/142771222-30e8b801-fa5c-4deb-9bbc-416cc0bb5b31.png">

**Proces Description:**

At the moment the hash algorithm are the one being finetuned and then process for checking the images will be next.

**Group member:** Rosali Gonzalez rc1052



