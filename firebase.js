// /scripts/firebase.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import { getFirestore, doc, getDoc, setDoc } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyC-xwBCeBR9gOZYuy5v6jRWcsqFzxqClW0",
  authDomain: "thecompanymissions.firebaseapp.com",
  projectId: "thecompanymissions",
  storageBucket: "thecompanymissions.firebasestorage.app",
  messagingSenderId: "1025657294999",
  appId: "1:1025657294999:web:69c6bbb95259b5af5259d2"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

export { db, doc, getDoc, setDoc };
