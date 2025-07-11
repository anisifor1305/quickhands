import React, { useState } from "react";

const MessageInput = ({ rootUrl }) => {
    const [message, setMessage] = useState("");
    // const csrf_token = '<?php echo csrf_token(); ?>';
    const url = window.location.href;
    const lastPart = url.split('/').pop()
    const messageRequest = async (text) => {
        try {
            await axios.post(`/message/${lastPart}`, {
                text,
            });
        } catch (err) {
            console.log(err);
        }
    };

    const sendMessage = (e) => {
        e.preventDefault();
        if (message.trim() === "") {
            alert("Please enter a message!");
            return;
        }

        messageRequest(message);
        setMessage("");
    };

    return (
        <form action="#" method="POST" encType="multipart/form-data">
            <input type="hidden" name="_token" value={csrf_token} />
            <input onChange={(e) => setMessage(e.target.value)}
                   autoComplete="off"
                   type="text"
                   className="form-control"
                   placeholder="Message..."
                   value={message}
            />
            <div className="input-group-append">
                <button onClick={(e) => sendMessage(e)}
                        className="btn btn-primary"
                        type="button">Send</button>
            </div>
        </form>
    );
        
};

export default MessageInput;