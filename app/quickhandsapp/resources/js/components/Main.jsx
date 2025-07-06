import React from 'react';
import ReactDOM from 'react-dom/client';
import '../../css/app.css';
import ChatBox from "./ChatBox.jsx";
import HomePage from './HomePage.jsx';

if (document.getElementById('main')) {
    const rootUrl = "http://127.0.0.1:8000"; 

    ReactDOM.createRoot(document.getElementById('main')).render(
        <React.StrictMode>
            <ChatBox rootUrl={rootUrl} />
        </React.StrictMode>
    );
}
if (document.getElementById('main-home')) {

    const component = document.getElementById('main-home');
    const props = Object.assign({}, component.dataset);
        ReactDOM.createRoot(document.getElementById('main-home')).render(
        <React.StrictMode>
            <HomePage/>
        </React.StrictMode>
    );
}