import { initializeApp } from "firebase/app";

const firebaseConfig = {
  apiKey: "AIzaSyCd2ePl55MpraNqw3mlC7Tk3qx5ZHlp8zk",
  authDomain: "weatherstation-e0a98.firebaseapp.com",
  projectId: "weatherstation-e0a98",
  storageBucket: "weatherstation-e0a98.firebasestorage.app",
  messagingSenderId: "835240658471",
  appId: "1:835240658471:web:b0396646f998b344ae7002",
};

const app = firebase.initializeApp(firebaseConfig);
const db = firebase.firestore();
