<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="css/blogstylee.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
*{
	margin: 0px;
	padding: 0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
.container{
	width: 100%;
	min-height: 100vh;
	background-color: #f7f7f7;
}
.container .blog-section{
	width: 80%;
	margin: 0px auto;
}
.container .blog-section .heading{
	width: 60%;
	text-align: center;
	margin: 0px auto;
}
.container .blog-section .heading h1{
	padding-top: 20px;
	font-size: 42px;
	color: #af8382;
}


/*.content{
	display: flex;
	justify-content: center;
	align-items: center;
	margin: 0px auto;
}*/

.content .card{
	flex:1;
	margin: 30px 15px;
	box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.2);
}
.read-more-container{
    display: flex;
    flex-direction: column;
    color: #111;
    gap: 1rem;
}

.container{
    padding: 2rem;
    background-color: #fff;
    border-radius: 2px;
    line-height: 1.4rem;
    box-shadow: 0 0 1rem rgba(0,0,0,.1);
}

.read-more-btn{
    color: #0984e3;
}

.read-more-text{
    display: none;
}

.read-more-text--show{
    display: inline;
}

.content .card img{
	width: 50%;
	height: auto;
}
.content .card .text-title{
	font-size: 25px;
	color: #000;
	font-weight: 600;
	margin: 5px 10px;
}
.content .card span{
	color: #6e6e6e;
	font-weight: normal;
}
.content .card h4{
	margin: 5px 10px;
	font-size: 16px;
	color: #6e6e6e;
}
.content .card p{
	font-size: 18px;
	margin: 5px 10px;
	line-height: 1.5;
	color: #4f4f4f;
}
.content .card a{
	text-decoration: none;
	font-size: 17px;
	display: inline-block;
	padding: 6px 10px;
	color: #fff;
	background-color: #5d7fa2;
	margin: 15px 10px;
	border-radius: 5px;
}
.content .card a:hover{
	background-color: #af8382;
	transition: 0.4s;
}
@media screen and (max-width:768px){
	.content{
		flex-direction: column;
	}
}
</style>
<body>
	<div class="container">
		<div class="blog-section">
			<div class="heading">
				<h1>BLOGS</h1>
			</div>

			<div class="content">
				<div class="card">
					<p class="text-title">Why Should You Donate Blood?<span> -May22,2022</span></p>
					<img src="img/blog.jpeg">
					<h4>Blood donation</h4>
					<p>Blood donation not only saves lives but also has key benefits that we are unaware of.  It balances the level of iron in the body, regulates blood flow, reduces the risk of cardiovascular disease and stroke, triggers production of new blood cells and helps in weight loss.</p>
					<a href="" class="button">Read More</a>
                </div>

                <div class="card">
					<p class="text-title">The Need for Blood Donation<span> -Nov22,2022</span></p>
					<img src="img/need.jpeg">
				<p>	Knowing that you have the power to save a life and not using it is like wrapping a gift and not giving it.

Blood donors are in true terms, “The real heroes”. 

 As a matter of fact, there is a constant need for a regular supply of blood throughout the world. Blood is the most precious gift one human can give to another for it literally means giving someone “the gift of life”.

Did you know? Statistics prove that every two seconds, there is a blood request made! Every two seconds! 
<span class="read-more-text">Blood cannot be obviously manufactured or produced outside of a human body and thus there is a higher need for the creation of awareness. 

Generous blood donors are the only people who can replenish the blood supply of the world on a constant level because the blood, even after donation must be used within a certain period of time. <span class="dots"> ...</span> <span class="moreText">

Statistics have also proven that more than 35% of people in the world are eligible for a donation of blood but the people who actually donate blood sum up to a mere 5%. 

The entire crux of humanity is to be human in its true sense. Being human requires one to be selfless and compassionate. The most selfless act is the generous act of blood donation. 

Also, science shows that 40% of the entire world’s population will need blood at least once in their lifetime. This means, donate blood because you too may need it one day. 

There are various other needs to donate blood 

1. To give back to society. 
We are always receiving from society and to be able to create balance and harmony for us and for our future generations, we need to give back. One way of giving back to society is through blood donation. Visit the nearest blood donation camp and do your part. It’s not an option, it is a necessity. 

2. To get a mini-physical exam for free. 
Not to mention, an added benefit of donating blood is the free mini-physical examination of your blood pressure, your temperature, etc. You don’t really need to go through with blood donation for a physical examination but it is a cherry on the cake, isn’t it?

3. To maintain a healthy heart and liver 
It is a proven fact that blood donation helps in the healthy maintenance of the human heart and liver for it balances out the iron overload in the body!

4. To stimulate the production of blood cells 
To stimulate the production of blood cells 

After the process of blood donation, the body of the donor works to replenish the blood cells and hence helps in the maintenance of good health! 


5. To help yourself in the  prevention of hemochromatosis 
Hemochromatosis is a health condition caused by the excess absorption of iron by the body. Regular blood donation would reduce the risk of this ailment and will help you stay healthy. 

Plan your blood donation well in advance. Consult a doctor if necessary. On the day of your blood donation, stay hydrated and wear comfortable clothes. 

Become a proud donor. 

All the best!</span></p>
<span class="read-more-btn">Read More...</span>
                </div>

                <div class="card">
					<p class="text-title">How can Technology help to reduce blood crisis in hard times?<span> -Oct22,2022</span></p>
					<img src="img/tech.jpeg">
					<h4>Technology</h4>
					<p class="text">Saving lives by donating blood sometimes feels over-exaggeration,<span class="read-more-text"> and India remains the world’s most substantial shortage of blood,</span></p>
					<span class="read-more-btn">Read More...</span>
                </div>

                <div class="card">
					<p class="text-title">A Mighty Challenge Blood Crisis in Corona Times<span> -August22,2022</span></p>
					<img src="img/covid.jpeg">
					<h4>Blood Crisis</h4>
					<p class="text">If you are thinking, “What good would it do to donate my blood!”, then keep reading. Many people hesitate to donate blood, thinking it is a tedious process and that they’d faint after that.</p>
					<a href="" class="button">Read More</a>
                </div>
                
                <div class="card">
					<p class="text-title">World Blood Donor Day<span> -May20,2022</span></p>
					<img src="img/donorday.jpeg">
					<h4>Donor Day</h4>
					<p class="text">World Blood Donor Day (WBDD) is held on 14 June every year as a worldwide celebration to honour and thank those people who donate their blood on a voluntary, unpaid basis to give the most precious gift of all – the Gift of Life.</p>
					<a href="" class="button">Read More</a>
                </div>
               
                
			</div>
		</div>
	</div>


</body>
<script src="script.js">
    </script>

</html>

