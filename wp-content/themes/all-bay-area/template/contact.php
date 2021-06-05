<?php
/* Template Name: Template - Contact Us*/
get_header(); ?>

<section class="header-img">
    <figure class="logo">
        <a href="">
            <img src="<?php echo get_stylesheet_directory_uri()?>/src/img/logo.svg" alt="Logo">
        </a>
    </figure>
    <figure class="hero-img">
        <img src="<?php echo get_stylesheet_directory_uri()?>/src/img/home-header.jpg" alt="Home IMG">
    </figure>
    <article class="hero-info">
        <strong>CONTACT US</strong>
        <h1>Booking our services</h1>
        <p>We eliminate all kinds of garbage; commercial, residential and property; we are professionals providing
            quality service.</p>
    </article>
</section>

<!--Contact -->
<section class="home-about contact">
    <h2>
        <p>CONTACT US</p>
        <strong>We reach all trese places and more!</strong>
    </h2>
    <p>
        We take care of eliminating all the items that you do not need in all these areas, if you do not see your
        address, do not hesitate to contact us, to provide you with a personalized service.
    </p>


    <ul class="contact_list">
        <li>Alameda</li>
        <li>Hayward</li>
        <li>Albany </li>
        <li>Hercules</li>
        <li>Antioch</li>
        <li>Hillsborough</li>
        <li>Atherton</li>
        <li>Kensington</li>
        <li>Berkeley</li>
        <li>Lafayette</li>
        <li>Burlingame</li>
        <li>Livermore </li>
        <li>Castro Valley</li>
        <li>Marin Country</li>
        <li>Hillsborough</li>
        <li>San Bruno</li>
        <li>Pleasant Hill</li>
        <li>San Francisco</li>
        <li>Pleasanton</li>
        <li>More Cities</li>
    </ul>



    <form class="contact__form">
        <div>
            <label>Name</label>
            <input type="text" class="contact__input" placeholder="Your Name">
        </div>

        <div>
            <label>E-Mail</label>
            <input type="email" class="contact__input" placeholder="Your Name">
        </div>

        <div>
            <label>Select your city</label>
            <select name="cities" class="contact__input">
                <option value="volvo">San Francisco</option>
                <option value="saab">Pleasanton</option>
                <option value="mercedes">Pleasant Hil</option>
                <option value="audi">Alameda</option>
            </select>
        </div>


        <div>
            <label>Write your message</label>
            <textarea name="" id="" class="contact__input" placeholder="Write your message"></textarea>
        </div>

        <input type="submit" class="btn btn--yellow" value="Send">
    </form>
</section>




<?php get_footer(); ?>