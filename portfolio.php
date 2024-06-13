<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <style>
:root {
    --glow-color: hsl(186 100% 69%);
  }

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow: auto;
    scroll-snap-type: x mandatory;
}

header {
    background-color: #333;
    padding: 20px 0;
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

.logo {
    color: white;
    font-size: 18px;
    font-weight: bold;
}

.hamburger {
    display: none;
    cursor: pointer;
    color: white;
    font-size: 24px;
}

nav {
    display: flex;
    justify-content: center;
}

.nav-links {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-size: 15px;
    transition: color 0.3s, transform 0.3s;
    display: flex;
    align-items: center;
}

.nav-links a i {
    margin-right: 8px;
}

.nav-links a:hover {
    color: #17e1e1;
    transform: scale(1.1);
}

.nav-links a:active {
    color: #17e1e1;
    transform: scale(1.2);
}

section {
    padding: 60px 20px;
    min-height: 100vh;
}

#nav-menu.active {
    display: flex;
    flex-direction: column;
    /* Aturan lainnya sesuai kebutuhan */
}

.card svg {
    height: 25px;
  }
  
  .card {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #333333;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
    height: 50px;
    width: 200px;
  }
  
  .card::before, .card::after {
    position: absolute;
    display: flex;
    align-items: center;
    width: 50%;
    height: 100%;
    transition: 0.25s linear;
    z-index: 1;
  }
  
  .card::before {
    content: "";
    left: 0;
    justify-content: flex-end;
    background-color: #2c2c2c;
  }
  
  .card::after {
    content: "";
    right: 0;
    justify-content: flex-start;
    background-color: #2a5050;
  }
  
  .card:hover {
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  }
  
  .card:hover span {
    opacity: 0;
    z-index: -3;
  }
  
  .card:hover::before {
    opacity: 0.5;
    transform: translateY(-100%);
  }
  
  .card:hover::after {
    opacity: 0.5;
    transform: translateY(100%);
  }
  
  .card span {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: whitesmoke;
    font-family: 'Fira Mono', monospace;
    font-size: 24px;
    font-weight: 700;
    opacity: 1;
    transition: opacity 0.25s;
    z-index: 2;
  }
  
  .card .social-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 25%;
    height: 100%;
    color: whitesmoke;
    font-size: 24px;
    text-decoration: none;
    transition: 0.25s;
  }
  
  .card .social-link svg {
    text-shadow: 1px 1px rgba(31, 74, 121, 0.7);
    transform: scale(1);
  }
  
  .card .social-link:hover {
    background-color: rgba(249, 244, 255, 0.774);
    animation: bounce_613 0.4s linear;
  }
  
  @keyframes bounce_613 {
    40% {
      transform: scale(1.4);
    }
  
    60% {
      transform: scale(0.8);
    }
  
    80% {
      transform: scale(1.2);
    }
  
    100% {
      transform: scale(1);
    }
  }


/* Media queries for smaller screens */
@media (max-width: 768px) {
    .hamburger {
        order: 3;
        display: block;
        margin-left: 20px;
    }

    nav {
        display: none;
        flex-direction: column;
        align-items: center;
        position: absolute;
        justify-content: space-between;
        top: 80px;
        right: 0;
        background-color: #333;
        width: 100%;
        background: linear-gradient(to bottom, #333 30%, #000000 70%);
    }

    .nav-links {
        flex-direction: column;
        align-items: center;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .nav-links a {
        font-size: 16px;
    }

    .section {
        padding: 40px 15px;
    }

    nav.active {
        display: flex;
        order: 3;
    }
    .card {
        order: 2;
    }

    .card > span{
        font-size: 15px;
    }

    .content > p {
        text-align: left;
    }
}

@media (max-width: 480px) {
    .nav-links a {
        font-size: 18px;
        
    }

    .section {
        padding: 30px 10px;
    }

    .box-container {
        flex-direction: column-reverse;
    }

    .box1 {
        order: 2;
    }

    .box2 {
        order: 1;
    }

    .card {
        order: 2;
    }
}
/* General fade-in animation */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}


.fade-in-left {
    animation: fadeInLeft 1s ease-in forwards;
}

.fade-in-right {
    animation: fadeInRight 1s ease-in forwards;
}


/* Style for the Beranda section */
#beranda {
    background:url(picture/backgorund\ grid.jpg);
    padding: 100px 20px;
    background-position: center;
    background-size: cover;
    scroll-snap-align: start;
}

.box-container {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    margin: auto;
}

.box {
    flex: 1;
    padding: 20px;
    box-sizing: border-box;
    opacity: 0;
}

.box1 {
    text-align: left;
}

.box1 h1 {
    margin-bottom: 20px;
    font-size: 50px;
    color: white;
}

.box1 p {
    margin-bottom: 20px;
    font-size: 30px;
    color: #ffffff;
}

.glowing-btn {
    position: absolute;
    color: var(--glow-color);
    cursor: pointer;
    padding: 0.35em 1em;
    border: 0.15em solid var(--glow-color);
    border-radius: 0.45em;
    background: none;
    perspective: 2em;
    font-family: "Raleway", sans-serif;
    font-size: 20px;
    font-weight: 900;
    letter-spacing: 10px;
    
    -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
    -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
    box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
      0px 0px 0.5em 0px var(--glow-color);
    animation: border-flicker 2s linear infinite;
  }
  
  .glowing-txt {
    float: left;
    margin-right: -0.8em;
    -webkit-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
      0 0 0.45em var(--glow-color);
      -moz-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
      0 0 0.45em var(--glow-color);
    text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
    animation: text-flicker 3s linear infinite;
  }
  
  .faulty-letter {
    color: #17e1e1;
      opacity: 0.5;
    animation: faulty-flicker 2s linear infinite;
  }
  
  .glowing-btn::before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    opacity: 0.7;
    filter: blur(1em);
    transform: translateY(120%) rotateX(95deg) scale(1, 0.35);
    background: var(--glow-color);
    pointer-events: none;
  }
  
  .glowing-btn::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    z-index: -1;
    background-color: var(--glow-color);
    box-shadow: 0 0 2em 0.2em var(--glow-color);
    transition: opacity 100ms linear;
  }
  
  .glowing-btn:hover {
    color: rgba(0, 0, 0, 0.8);
    text-shadow: none;
    animation: none;
  }
  
  .glowing-btn:hover .glowing-txt {
    animation: none;
  }
  
  .glowing-btn:hover .faulty-letter {
    animation: none;
    text-shadow: none;
    opacity: 1;
    color: #1b3133;
  }
  
  .glowing-btn:hover:before {
    filter: blur(1.5em);
    opacity: 1;
  }
  
  .glowing-btn:hover:after {
    opacity: 1;
  }
  
  @keyframes faulty-flicker {
    0% {
      opacity: 0.1;
    }
    2% {
      opacity: 0.1;
    }
    4% {
      opacity: 0.5;
    }
    19% {
      opacity: 0.5;
    }
    21% {
      opacity: 0.1;
    }
    23% {
      opacity: 1;
    }
    80% {
      opacity: 0.5;
    }
    83% {
      opacity: 0.4;
    }
  
    87% {
      opacity: 1;
    }
  }
  
  @keyframes text-flicker {
    0% {
      opacity: 0.1;
    }
  
    2% {
      opacity: 1;
    }
  
    8% {
      opacity: 0.1;
    }
  
    9% {
      opacity: 1;
    }
  
    12% {
      opacity: 0.1;
    }
    20% {
      opacity: 1;
    }
    25% {
      opacity: 0.3;
    }
    30% {
      opacity: 1;
    }
  
    70% {
      opacity: 0.7;
    }
    72% {
      opacity: 0.2;
    }
  
    77% {
      opacity: 0.9;
    }
    100% {
      opacity: 0.9;
    }
  }
  
  @keyframes border-flicker {
    0% {
      opacity: 0.1;
    }
    2% {
      opacity: 1;
    }
    4% {
      opacity: 0.1;
    }
  
    8% {
      opacity: 1;
    }
    70% {
      opacity: 0.7;
    }
    100% {
      opacity: 1;
    }
  }
  
  @media only screen and (max-width: 600px) {
    .glowing-btn{
      font-size: 1em;
    }
  }

  .button5 {
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    border: none;
    background: none;
    color: #0f1923;
    cursor: pointer;
    position: relative;
    padding: 8px;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
    transition: all .15s ease;
    margin-right: 25px;
  }
  
  .button5::before,
  .button5::after {
    content: '';
    display: block;
    position: absolute;
    right: 0;
    left: 0;
    height: calc(50% - 5px);
    border: 1px solid #7D8082;
    transition: all .15s ease;
  }
  
  .button5::before {
    top: 0;
    border-bottom-width: 0;
  }
  
  .button5::after {
    bottom: 0;
    border-top-width: 0;
  }
  
  .button5:active,
  .button5:focus {
    outline: none;
  }
  
  .button5:active::before,
  .button5:active::after {
    right: 3px;
    left: 3px;
  }
  
  .button5:active::before {
    top: 3px;
  }
  
  .button5:active::after {
    bottom: 3px;
  }
  
  .button_lg {
    position: relative;
    display: block;
    padding: 10px 20px;
    color: #fff;
    background-color: #0f1923;
    overflow: hidden;
    box-shadow: inset 0px 0px 0px 1px transparent;
  }
  
  .button_lg::before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 2px;
    height: 2px;
    background-color: #0f1923;
  }
  
  .button_lg::after {
    content: '';
    display: block;
    position: absolute;
    right: 0;
    bottom: 0;
    width: 4px;
    height: 4px;
    background-color: #0f1923;
    transition: all .2s ease;
  }
  
  .button_sl {
    display: block;
    position: absolute;
    top: 0;
    bottom: -1px;
    left: -8px;
    width: 0;
    background-color: #ff4655;
    transform: skew(-15deg);
    transition: all .2s ease;
  }
  
  .button_text {
    position: relative;
  }
  
  .button5:hover {
    color: #0f1923;
  }
  
  .button5:hover .button_sl {
    width: calc(100% + 15px);
  }
  
  .button5:hover .button_lg::after {
    background-color: #fff;
  }
  

.box2 {
    display:flex;
    text-align: center;
    justify-content: center;
}

.card2 {
    width: 280px;
    height: 280px;
    background: transparent;
    border-radius: 32px;
    padding: 3px;
    position: relative;
    box-shadow: #604b4a30 0px 70px 30px -50px;
    transition: all 0.5s ease-in-out;
    position: relative;
  }
  
  .card2 .mail {
    position: absolute;
    right: 2rem;
    top: 1.4rem;
    background: transparent;
    border: none;
  }
  
  .card2 .mail svg {
    stroke: wheat;
    stroke-width: 3px;
  }
  
  .card2 .mail svg:hover {
    stroke: #43e460;
  }
  
  .card2 .profile-pic {
    position: absolute;
    width: calc(100% - 6px);
    height: calc(100% - 6px);
    top: 3px;
    left: 3px;
    border-radius: 29px;
    z-index: 1;
    border: 0px solid #00203d;
    overflow: hidden;
    transition: all 0.5s ease-in-out 0.2s, z-index 0.5s ease-in-out 0.2s;
    background: url(picture/profile_yg_bner-removebg-preview.png);
    background-size: cover;
  }
  
  .card2 .profile-pic img {
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
    height: 100%;
    -o-object-position: 0px 0px;
    object-position: 0px 0px;
    transition: all 0.5s ease-in-out 0s;
  }
  
  .card2 .profile-pic svg {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: 0px 0px;
    object-position: 0px 0px;
    transform-origin: 45% 20%;
    transition: all 0.5s ease-in-out 0s;
  }
  
  .card2 .bottom {
    position: absolute;
    bottom: 3px;
    left: 3px;
    right: 3px;
    background: #00203d;
    top: 80%;
    border-radius: 29px;
    z-index: 2;
    box-shadow: rgba(96, 75, 74, 0.1882352941) 0px 5px 5px 0px inset;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.645, 0.045, 0.355, 1) 0s;
  }
  
  .card2 .bottom .content {
    position: absolute;
    bottom: 0;
    left: 1.5rem;
    right: 1.5rem;
    height: 160px;
  }
  
  .card .bottom .content .name {
    display: block;
    font-size: 1.2rem;
    color: white;
    font-weight: bold;
  }

  .content > .name {
    color: white;
  }
  
  .card2 .bottom .content .about-me {
    display: block;
    font-size: 0.9rem;
    color: white;
    margin-top: 1rem;
  }
  
  .card2 .bottom .bottom-bottom {
    position: absolute;
    bottom: 1rem;
    left: 1.5rem;
    right: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .card2 .bottom .bottom-bottom .social-links-container {
    display: flex;
    gap: 1rem;
  }
  
  .card2 .bottom .bottom-bottom .social-links-container svg {
    height: 20px;
    fill: white;
    filter: drop-shadow(0 5px 5px rgba(165, 132, 130, 0.1333333333));
  }
  
  .card2 .bottom .bottom-bottom .social-links-container svg:hover {
    fill: black;
    transform: scale(1.2);
  }

  .social-links-container > svg > a {
    fill: whitesmoke;
  }

  .social-links-container > svg > a:hover{
    fill: black;
  }
  
  .card2 .bottom .bottom-bottom .button {
    text-decoration: none;
    background: white;
    color: #00203d;
    border: none;
    border-radius: 20px;
    font-size: 0.6rem;
    padding: 0.4rem 0.6rem;
    box-shadow: rgba(165, 132, 130, 0.1333333333) 0px 5px 5px 0px;
  }
  
  .card2 .bottom .bottom-bottom .button a {
    text-decoration: none;
  }

  .card2 .bottom .bottom-bottom .button:hover {
    background: #43e460;
    color: white;
  }
  
  .card2:hover {
    border-top-left-radius: 55px;
  }
  
  .card2:hover .bottom {
    top: 20%;
    border-radius: 80px 29px 29px 29px;
    transition: all 0.5s cubic-bezier(0.645, 0.045, 0.355, 1) 0.2s;
  }
  
  .card2:hover .profile-pic {
    width: 100px;
    height: 100px;
    aspect-ratio: 1;
    top: 10px;
    left: 10px;
    border-radius: 50%;
    z-index: 3;
    border: 5px solid beige;
    box-shadow: rgba(54, 42, 41, 0.188) 11  0px 50px 50px 120px;
    transition: all 0.5s ease-in-out, z-index 0.5s ease-in-out 0.1s;
  }
  
  .card2:hover .profile-pic:hover {
    transform: scale(1.3);
    border-radius: 0px;
  }
  
  .card2:hover .profile-pic img {
    transform: scale(2.5);
    -o-object-position: 0px 25px;
    object-position: 0px 25px;
    transition: all 0.5s ease-in-out 0.5s;
  }
  
  .card2:hover .profile-pic svg {
    transform: scale(2.5);
    transition: all 0.5s ease-in-out 0.5s;
  }


/* Media queries for smaller screens */
@media (max-width: 768px) {
    .box-container {
        flex-direction: column;
    }

    .box {
        padding: 10px;
    }
    
    .box1 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .box1 h1 {
        font-size: 22px;
    }

    .box1 p {
        font-size: 16px;
    }

    .box1 .btn {
        padding: 10px 15px;
        font-size: 14px;
    }

    .box2 img {
        width: 300px;
        height: 300PX;
    }
    
    .glowing-btn {
        margin: 10px;
        position: relative;
    }

    .wa {
        margin-right: 0px;
    }
}

@media (max-width: 480px) {
    .box1 h1 {
        font-size: 20px;
    }
    
    .box1 p {
        font-size: 14px;
    }
    

    .box1 .btn {
        padding: 8px 12px;
        font-size: 12px;
    }
    
    .box2 img {
        width: 300PX;
        height: 300px;
    }

    #beranda {
      padding: 88px 20px;
    }
    
    .box1 {
      justify-content: center;
    }
}

/* Style for the Tentang Saya section */
.about-section {
  background: url(picture/background\ spider.jpg);
  color: #fff;
  padding: 60px 0;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.section-title {
  font-size: 2.5em;
  margin-bottom: 20px;
  position: relative;
}

.about-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.about-box {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  padding: 20px;
  width: calc(33.333% - 20px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s, background 0.3s;
  position: relative;
}

.about-box h3 {
  font-size: 1.5em;
  margin-bottom: 10px;
}

.about-box p {
  font-size: 1em;
  margin: 0;
}

.about-box:hover {
  transform: scale(1.1);
  background: rgba(255, 255, 255, 0.2);
}

/* Spiderman web animation */
.about-section::before {
  content: '';
  position: absolute;
  top: -50px;
  left: -50px;
  width: 200%;
  height: 200%;
  background: url('picture/background\ spider.jpg') repeat;
  opacity: 0.1;
  z-index: 0;
  animation: spin 60s linear infinite;
}

.about-box {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.about-box.fade-in {
  opacity: 1;
  transform: translateY(0);
}

@keyframes spin {
  from {
      transform: rotate(0deg);
  }
  to {
      transform: rotate(360deg);
  }
}

.about-box, .section-title {
  z-index: 1;
}

/* Responsive */
@media (max-width: 480px) {
  .about-box {
      width: calc(100% - 20px);
  }
}



#pendidikan {
    text-align: center;
    padding: 80px 20px;
    background:url(picture/background\ bumi.jpg);
    background-position: center;
    background-size: cover;
}

#pendidikan h1 {
    margin-bottom: 40px;
    color: white;
}

.pendidikan-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
}

.pendidikan-box {
    flex: 1 1 45%; /* Adjust the size of the boxes */
    box-sizing: border-box;
    padding: 20px;
    margin: 10px;
    background-color: transparent;
    text-align: center;
    opacity: 0; /* Start invisible for animation */
    transition: opacity 1.5s ease-in;
}

.pendidikan-box img {
max-width: 150px;
    margin-bottom: 20px;
}

#logo-sd {
    max-width: 250px;
}

#logo-smk {
    max-width: 300px;
}

.pendidikan-box h3 {
    margin-bottom: 10px;
    color: white;
}

.pendidikan-box p {
    color: white;
    margin: 0;
}

/* Add fade-in animation */
.fade-in {
    opacity: 1;
}

/* Animation delay */
.delay-1 {
    transition-delay: 0.5s;
}

.delay-2 {
    transition-delay: 1s;
}

.delay-3 {
    transition-delay: 1.5s;
}

/* Responsive adjustments */
@media (max-width: 480px) {
    .pendidikan-box {
        flex: 1 1 100%; /* Stack boxes vertically */
    }

    .pendidikan-box > .textsd {
      color: black;
    }
}

/* Section Pengalaman */
/* Section Pengalaman */
#pengalaman {
  padding: 80px 0;
  text-align: center;
  background:url(picture/backgriund\ raka.jpg);
  background-size: cover;
  background-position: right;
}

#pengalaman h2 {
  font-size: 2.5em;
  margin-bottom: 20px;
  transform: translateY(-20px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  color: white;
}

.experience-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  overflow-y: auto;
}

.experience-box {
  background: transparent;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 80%;
  max-width: 600px;
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, opacity 0.6s ease-out;
  transition: 0.5s;
  opacity: 0;
  transform: translateY(20px);
  color: white;
}

.experience-box.visible {
  opacity: 1;
  transform: translateY(0);
}

.experience-box:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  background: #00203d;
}

/* Responsive adjustments */
@media (max-width: 480px) {
  .experience-box {
      width: 90%;
  }
}

/* pencapaian */

#pencapaian {
  text-align: center;
  padding: 60px 20px;
  background:url(picture/backgroundblue\ blak.jpg);
  background-size: cover;
  background-position: center;
}

#pencapaian h2 {
  font-size: 2em;
  margin-bottom: 40px;
  color: white;
}

.achievements {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  flex-direction: row;
}

.achievement {
  position: relative;
  width: 200px;
  height: 200px;
  overflow: hidden;
  border-radius: 15px;
  border: 2px solid white;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  margin: 10px;
  width: calc(10% - 2px);
  transition: 1s;
}

.achievement::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  transition: transform 0.3s ease;
  z-index: 0;
  filter: brightness(0.7);
}

.achievement[data-img="path/to/piala1.jpg"]::before {
  background-image: url('picture/jura\ 1\ .png');
}

.achievement[data-img="path/to/piala2.jpg"]::before {
  background-image: url('picture/juara12.jpg');
}

.achievement[data-img="path/to/piala3.jpg"]::before {
  background-image: url('picture/juara\ 2\ 10.jpg');
  background-size: cover;
  background-position: center
}

.achievement[data-img="path/to/piala4.jpg"]::before {
  background-image: url('picture/Rakha\ -\ sertifikat\ HTML_page-0001.jpg');
}
.achievement[data-img="path/to/piala5.jpg"]::before {
  background-image: url('picture/Rakha\ -\ Sertifikat\ CSS_page-0001.jpg');
}

.achievement[data-img="path/to/piala6.jpg"]::before {
  background-image: url('picture/Panitia.png');
}

.achievement:hover {
  width: calc(30% - 2px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.achievement .content {
  position: absolute;
  bottom: 20px;
  left: 20px;
  color: #fff;
  z-index: 1;
  transition: opacity 0.3s ease;
  display: flex;
  font-size: 15px;
}

.achievement:hover .content {
  opacity: 0;
}

.coding {
  color: white;
  -webkit-text-stroke: 2px black; /* Untuk browser WebKit seperti Safari */
  -webkit-text-stroke: 2px black;
}

/* Media queries untuk responsif pada perangkat seluler */
@media screen and (max-width: 768px) { 
  .achievements {
    flex-direction: column;
  }

  .achievement {
    width: 100%;
    max-height: 200px;
    gap: 0px;
  }

  .achievement:hover {
    transform: scale(1.1);
    width: 100%;
  }

  .content {
    font-size: 25px;
  }
}


/* rating */




    </style>
</head>
<body>
<header>
        <div class="container">
            <div class="logo">Rakha Pandu Narendra</div>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <nav id="nav-menu">
                <ul class="nav-links">
                    <li><a href="#beranda"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#tentang-saya"><i class="fas fa-user"></i> Tentang Saya</a></li>
                    <li><a href="#pendidikan"><i class="fas fa-graduation-cap"></i> Pendidikan</a></li>
                    <li><a href="#pengalaman"><i class="fas fa-briefcase"></i> Pengalaman</a></li>  
                    <li><a href="#pencapaian"><i class="fas fa-briefcase"></i> Pencapaian</a></li>  
                </ul>
            </nav>
            <div class="card">
                <span>Social Media</span>
                <a class="social-link" href="https://www.youtube.com/channel/UCK_8z0RHoJ-Q6b-k7yBuGbQ" target="_blank">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461.001 461.001" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#F61C0D;" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728 c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137 C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607 c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"></path> </g> </g></svg>
                </a>
                <a class="social-link" href="https://www.tiktok.com/@rakhapandunarendr?_t=8mYIu2Q5js8&_r=1" target="_blank">
                  <svg fill="#000000" viewBox="0 0 512 512" id="icons" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"></path></g></svg>
                </a>
                <a class="social-link" href=https://discord.gg/yMrzV5K9Za" target="_blank">
                  <svg viewBox="0 -28.5 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z" fill="#5865F2" fill-rule="nonzero"> </path> </g> </g></svg>
                </a>
                <a class="social-link" href="https://codepen.io/Rpandu16" target="_blank">
                  <svg fill="#000000" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M488.1 414.7V303.4L300.9 428l83.6 55.8zm254.1 137.7v-79.8l-59.8 39.9zM512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm278 533c0 1.1-.1 2.1-.2 3.1 0 .4-.1.7-.2 1a14.16 14.16 0 0 1-.8 3.2c-.2.6-.4 1.2-.6 1.7-.2.4-.4.8-.5 1.2-.3.5-.5 1.1-.8 1.6-.2.4-.4.7-.7 1.1-.3.5-.7 1-1 1.5-.3.4-.5.7-.8 1-.4.4-.8.9-1.2 1.3-.3.3-.6.6-1 .9-.4.4-.9.8-1.4 1.1-.4.3-.7.6-1.1.8-.1.1-.3.2-.4.3L525.2 786c-4 2.7-8.6 4-13.2 4-4.7 0-9.3-1.4-13.3-4L244.6 616.9c-.1-.1-.3-.2-.4-.3l-1.1-.8c-.5-.4-.9-.7-1.3-1.1-.3-.3-.6-.6-1-.9-.4-.4-.8-.8-1.2-1.3a7 7 0 0 1-.8-1c-.4-.5-.7-1-1-1.5-.2-.4-.5-.7-.7-1.1-.3-.5-.6-1.1-.8-1.6-.2-.4-.4-.8-.5-1.2-.2-.6-.4-1.2-.6-1.7-.1-.4-.3-.8-.4-1.2-.2-.7-.3-1.3-.4-2-.1-.3-.1-.7-.2-1-.1-1-.2-2.1-.2-3.1V427.9c0-1 .1-2.1.2-3.1.1-.3.1-.7.2-1a14.16 14.16 0 0 1 .8-3.2c.2-.6.4-1.2.6-1.7.2-.4.4-.8.5-1.2.2-.5.5-1.1.8-1.6.2-.4.4-.7.7-1.1.6-.9 1.2-1.7 1.8-2.5.4-.4.8-.9 1.2-1.3.3-.3.6-.6 1-.9.4-.4.9-.8 1.3-1.1.4-.3.7-.6 1.1-.8.1-.1.3-.2.4-.3L498.7 239c8-5.3 18.5-5.3 26.5 0l254.1 169.1c.1.1.3.2.4.3l1.1.8 1.4 1.1c.3.3.6.6 1 .9.4.4.8.8 1.2 1.3.7.8 1.3 1.6 1.8 2.5.2.4.5.7.7 1.1.3.5.6 1 .8 1.6.2.4.4.8.5 1.2.2.6.4 1.2.6 1.7.1.4.3.8.4 1.2.2.7.3 1.3.4 2 .1.3.1.7.2 1 .1 1 .2 2.1.2 3.1V597zm-254.1 13.3v111.3L723.1 597l-83.6-55.8zM281.8 472.6v79.8l59.8-39.9zM512 456.1l-84.5 56.4 84.5 56.4 84.5-56.4zM723.1 428L535.9 303.4v111.3l103.6 69.1zM384.5 541.2L300.9 597l187.2 124.6V610.3l-103.6-69.1z"></path> </g></svg>
                </a>
              </div>
        </div>
    </header>

    <section id="beranda">
        <div class="box-container">
            <div class="box box1">
                <h1>Selamat Datang di Portofolio Saya</h1>
                <p>I'm <span id="typing-text"></span></p>
                <button class="button5" id="downloadButton">
                  <span class="button_lg">
                      <span class="button_sl"></span>
                      <span class="button_text">Download CV</span>
                  </span>
              </button>
                <a href="#tentang-saya"><button class='glowing-btn'><span class='glowing-txt'>NE<span class='faulty-letter'>X</span>T</span></button></a>
            </div>
            <div class="box box2">
                <div class="card2">
                    <button class="mail"><a href="https://wa.me/6289506462123?text=Halo%20saya%20ingin%20menghubungi%20Anda" target="_blank">
                      <svg
                        class="lucide lucide-mail"
                        stroke-linejoin="round"
                        stroke-linecap="round"
                        stroke-width="2"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                        height="24"
                        width="24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <rect rx="2" y="4" x="2" height="16" width="20"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                   </svg></a>
                    </button>
                    <div class="profile-pic"></div>
                    <div class="bottom">
                      <div class="content">
                        <span class="name">Rakha</span>
                        <span class="about-me"
                          >"Tetap Tenang adalah solusi"
                        </span>
                      </div>
                      <div class="bottom-bottom">
                        <div class="social-links-container">
                          <svg
                            viewBox="0 0 16 15.999"
                            height="15.999"
                            width="16"
                            xmlns="http://www.w3.org/2000/svg"
                          ><a href="https://www.instagram.com/rakacoy16/" target="_blank">
                            <path
                              transform="translate(6 598)"
                              d="M6-582H-2a4,4,0,0,1-4-4v-8a4,4,0,0,1,4-4H6a4,4,0,0,1,4,4v8A4,4,0,0,1,6-582ZM2-594a4,4,0,0,0-4,4,4,4,0,0,0,4,4,4,4,0,0,0,4-4A4.005,4.005,0,0,0,2-594Zm4.5-2a1,1,0,0,0-1,1,1,1,0,0,0,1,1,1,1,0,0,0,1-1A1,1,0,0,0,6.5-596ZM2-587.5A2.5,2.5,0,0,1-.5-590,2.5,2.5,0,0,1,2-592.5,2.5,2.5,0,0,1,4.5-590,2.5,2.5,0,0,1,2-587.5Z"
                              data-name="Subtraction 4"
                              id="Subtraction_4"
                            ></path></a>
                          </svg>
                          <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <a href=""><path
                              d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
                            ></path></a>
                          </svg>
                  
                          <svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                            <a href="https://github.com/Rpandu16" target="_blank"><path
                              d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                            ></path></a>
                          </svg>
                        </div>
                        <button class="button"><a href="https://wa.me/6289506462123?text=Hallo%20saya%20ingin%20Memukuli%20Anda" target="_blank">Contact Me</a></button>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    
    <section id="tentang-saya" class="about-section">
      <h2 class="section-title">Tentang Saya</h2>
      <div class="about-content">
          <div class="about-box">
              <h3>Nama Lengkap</h3>
              <p>Rakha Pandu Narendra</p>
          </div>
          <div class="about-box">
              <h3>Tanggal Lahir</h3>
              <p>16 Juni 2005</p>
          </div>
          <div class="about-box">
              <h3>Alamat</h3>
              <p>Villa Gading Harapan 33 Blok B 19 No 21</p>
          </div>
          <div class="about-box">
              <h3>Hobi</h3>
              <p>Futsal/Sepak bola</p>
          </div>
          <div class="about-box">
              <h3>Keahlian</h3>
              <p>Critical Thinking</p>
          </div>
          <div class="about-box">
              <h3>Pendidikan</h3>
              <p>SMK Islam Vinama 2</p>
          </div>
          <div class="about-box">
              <h3>Cita-Cita</h3>
              <p>Belanja Tanpa Liat Harga</p>
          </div>
      </div>
  </section>
  
    <section id="pendidikan">
        <h1>Pendidikan</h1>
        <div class="pendidikan-container">
            <div class="pendidikan-box box1a">
                <img src="picture/lgo_sekolah-removebg-preview.png" alt="Logo Sekolah" id="logo-sd">
                <h3 class="textsd">SDN 01 Kedung jaya</h3>
                <p class="textsd">2012 - 2018</p>
            </div>

            <div class="pendidikan-box box2b">
                <img src="picture/lgoo_smp-removebg-preview.png" alt="Logo Sekolah">
                <h3>SMPN 5 Babelan</h3>
                <p>2018-2021</p>
            </div>
            <div class="pendidikan-box box3a">
                <img src="picture/lkohgo.png" alt="Logo Sekolah" id="logo-smk">
                <h3>SMK Islam Vinama 2</h3>
                <p>2021-2024</p>
            </div>
        </div>
    </section>
    
    <section id="pengalaman">
      <h2>Pengalaman</h2>
      <div class="experience-container">
          <div class="experience-box">
              <h3>Praktek Kerja Lapangan (PKL)</h3>
              <p>PT. Hernandi Jaya Abadi</p>
              <p>26 Oktober 2022 - 26 Januari 2023 (3 bulan)</p>
              <ul>
                  <li>Sebagai Admin Website</li>
                  <li>Mengelola 4 website perusahaan</li>
                  <li>Membuat 1 artikel untuk 1 website setiap hari, total 4 artikel dalam 1 hari</li>
                  <li>Sebagai Helper Event</li>
                  <li>Membantu kegiatan event penjualan</li>
                  <li>Mendokumentasikan kegiatan melalui foto</li>
              </ul>
          </div>
          <div class="experience-box">
              <h3>Tugas Akhir Sekolah</h3>
              <p>Nov 2023 - Feb 2024</p>
              <p>RANCANG BANGUN JARINGAN HOTSPOT DENGAN MENGGUNAKAN FITUR VOUCHER DI MIKROTIK DAN ACCESS POINT.</p>
              <ul>
                  <li>Sebagai ketua projek</li>
                  <li>Membuat makalah</li>
                  <li>Mempresentasikan makalah</li>
                  <li>Mempraktekkan projek</li>
              </ul>
          </div>
      </div>
  </section>
  
  <section id="pencapaian">
    <h2>Pencapaian</h2>
    <div class="achievements">
        <div class="achievement" data-img="path/to/piala1.jpg">
            <div class="content">
                <p>Juara 1 Futsal - Atlanta (2023)</p>
            </div>
        </div>
        <div class="achievement" data-img="path/to/piala4.jpg">
            <div class="content">
                <p class="coding">Sertifikasi HTML di AlwaysCoding (2024)</p>
            </div>
        </div>
        <div class="achievement" data-img="path/to/piala5.jpg">
            <div class="content">
                <p class="coding">Sertifikasi CSS di AlwaysCoding (2024)</p>
            </div>
        </div>
        <div class="achievement" data-img="path/to/piala2.jpg">
            <div class="content">
                <p>Juara 2 Putra Voli Kelas 12 - SMK (2023)</p>
            </div>
        </div>
        <div class="achievement" data-img="path/to/piala3.jpg">
            <div class="content">
                <p>Juara 2 Putra Voli Kelas 10 - SMK (2021)</p>
            </div>
        </div>
        <div class="achievement" data-img="path/to/piala6.jpg">
            <div class="content">
                <p>Ketua Panitia 17an RT 15 RW 10 (2022)</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }

        // Close the navigation menu on mobile after clicking a link
        document.getElementById('nav-menu').classList.remove('active');
    });
});

document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('nav-menu').classList.toggle('active');
});

// Typing effect
const texts = ["Rakha Pandu Narendra", "Fresh Graduate"];
let count = 0;
let index = 0;
let currentText = "";
let letter = "";

(function type() {
    if (count === texts.length) {
        count = 0;
    }
    currentText = texts[count];
    letter = currentText.slice(0, ++index);

    document.getElementById('typing-text').textContent = letter;
    if (letter.length === currentText.length) {
        count++;
        index = 0;
        setTimeout(type, 2000); // waktu jeda sebelum teks berikutnya
    } else {
        setTimeout(type, 200); // kecepatan mengetik
    }
})();


// Fade-in effect on load
window.addEventListener('load', () => {
    document.querySelector('.box1').classList.add('fade-in-left');
    document.querySelector('.box2').classList.add('fade-in-right');
});


// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }

        document.getElementById('nav-menu').classList.remove('active');
    });
});

document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('nav').classList.toggle('active');
});


const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            observer.unobserve(entry.target); // Stop observing once the element has appeared
            // Panggil fungsi untuk memulai animasi foto profil setelah teks dan deskripsi singkat muncul
            startProfileAnimation();
        }
    });
}, {
    threshold: 0.1
});

// tentang saya

document.addEventListener('DOMContentLoaded', function () {
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 1 });

    document.querySelectorAll('.about-box').forEach(box => {
        observer.observe(box);
    });
});


// pendidikan

document.addEventListener('DOMContentLoaded', function() {
    const sectionPendidikan = document.querySelector('#pendidikan');
    const boxes = document.querySelectorAll('.pendidikan-box');

    const observerOptions = {
        threshold: 0.1
    };

    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                boxes.forEach((box, index) => {
                    box.classList.add('fade-in');
                    box.style.transitionDelay = `${index * 0.5}s`;
                });
                observer.unobserve(entry.target); // Stop observing the section once it's in view
            }
        });
    }, observerOptions);

    sectionObserver.observe(sectionPendidikan);
});


//  pengalaman

document.addEventListener('DOMContentLoaded', function() {
    const sectionPengalaman = document.querySelector('#pengalaman');
    const boxes = document.querySelectorAll('.pengalaman-box');

    const observerOptions = {
        threshold: 0.1
    };

    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                boxes.forEach((box, index) => {
                    setTimeout(() => {
                        box.classList.add('fade-in');
                    }, index * 500); // Delay each box by 0.5s
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    sectionObserver.observe(sectionPengalaman);
});


// pengalaman

document.addEventListener("DOMContentLoaded", function () {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const experienceBoxes = document.querySelectorAll(".experience-box");
    const sectionTitle = document.querySelector("#pengalaman h2");

    experienceBoxes.forEach(box => {
        observer.observe(box);
    });
    observer.observe(sectionTitle);
});

// pencapaian

document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll(".achievement");

    function checkVisibility() {
        const triggerBottom = window.innerHeight / 5 * 4;
        
        items.forEach((item, index) => {
            const itemTop = item.getBoundingClientRect().top;

            if (itemTop < triggerBottom) {
                setTimeout(() => {
                    item.classList.add("visible");
                }, index * 200); // delay each item
            }
        });
    }

    window.addEventListener("scroll", checkVisibility);
    checkVisibility(); // check on load
});

// download cv

document.getElementById('downloadButton').addEventListener('click', function() {
    // Ganti "nama_file.pdf" dengan nama file CV Anda beserta ekstensinya
    var fileUrl = 'file/Rakha - CV.pdf';

    // Membuat sebuah anchor element
    var downloadAnchor = document.createElement('a');
    downloadAnchor.href = fileUrl;
    
    // Mendownload file dengan cara men-trigger klik pada anchor element
    downloadAnchor.download = 'Rakha - CVR.pdf'; // Nama file yang akan di-download
    downloadAnchor.click();
});
</script>

</body>
</html>
