// firebase-messaging-sw.js
importScripts('https://www.gstatic.com/firebasejs/3.6.8/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.6.8/firebase-messaging.js');

firebase.initializeApp({
    messagingSenderId: 'AIzaSyAlixICoRHUMXUOisMyQWQVShoh74KZtr8'
});

const messaging = firebase.messaging();


