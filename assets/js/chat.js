const chatBox = document.getElementById('chat-box');
chatBox.scrollTop = chatBox.scrollHeight;


const pusher = new Pusher('149d5000036ee6d6283a', { cluster: 'ap2', encrypted: true });
const channel = pusher.subscribe(`chat-channel-${userId}-${receiverId}`);


channel.bind('new-message', (data) => {
    
    const messageElement = document.createElement('div');
    messageElement.className = data.sender === userId ? 'message-sent' : 'message-received';
    messageElement.innerHTML = `
        <strong>${data.sender === userId ? 'You' : receiverUsername}:</strong>
        ${data.message}
        <div class="timestamp">${new Date().toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}</div>
    `;
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight;
});

document.getElementById('chat-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const message = document.getElementById('message').value;

    fetch('send_message.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ receiver_id: receiverId, message }),
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) console.error('Failed to send message:', data.error);
    })
    .catch(error => console.error('Error:', error));

    document.getElementById('message').value = '';
});
