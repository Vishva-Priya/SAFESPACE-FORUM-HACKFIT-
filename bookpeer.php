<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connect With a Peer - Mental Wellness</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<style>
//* --- Light Theme Version --- */
* {margin:0;padding:0;box-sizing:border-box;}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #e3f2fd 0%, #f9f9ff 100%);
  min-height: 100vh;
  padding: 20px;
  color: #333;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.header {
  text-align: center;
  margin-bottom: 50px;
  padding: 30px 20px;
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(8px);
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.header h1 {
  color: #2b3a67;
  font-size: 2.5em;
  margin-bottom: 15px;
  line-height: 1.3;
}

.header p {
  color: #555;
  font-size: 1.1em;
  margin-bottom: 25px;
}

.connect-btn {
  background: #4a90e2;
  color: white;
  padding: 15px 40px;
  border: none;
  border-radius: 50px;
  font-size: 1.1em;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
}

.connect-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
}

.peers-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  margin-top: 40px;
}

.peer-card {
  background: white;
  border-radius: 20px;
  padding: 25px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  text-align: center;
}

.peer-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.peer-photo {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  margin: 0 auto 20px;
  background: linear-gradient(135deg, #a5c9f8 0%, #c3d9ff 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 3em;
  color: #2b3a67;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.peer-name {
  font-size: 1.4em;
  font-weight: bold;
  color: #2b3a67;
  margin-bottom: 10px;
}

.peer-speciality {
  color: #666;
  font-size: 0.9em;
  margin-bottom: 15px;
}

.rating {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  font-size: 1.2em;
}

.stars { color: #ffc107; margin-right: 8px; }
.rating-number { color: #444; font-weight: bold; }

.book-btn {
  background: linear-gradient(135deg, #6ea8fe 0%, #9cc0ff 100%);
  color: white;
  padding: 12px 35px;
  border: none;
  border-radius: 50px;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  width: 100%;
}

.book-btn:hover {
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(110, 168, 254, 0.4);
}

.availability {
  display: inline-block;
  padding: 5px 15px;
  border-radius: 20px;
  font-size: 0.85em;
  margin-bottom: 15px;
  font-weight: 600;
}

.available {
  background: #d4edda;
  color: #155724;
}

.busy {
  background: #fff3cd;
  color: #856404;
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(220, 230, 250, 0.8);
  backdrop-filter: blur(6px);
}

.modal-content {
  background: white;
  margin: 5% auto;
  padding: 0;
  border-radius: 20px;
  width: 90%;
  max-width: 500px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}

.modal-header {
  background: linear-gradient(135deg, #8bb6f9 0%, #a5c9f8 100%);
  color: white;
  padding: 25px;
  text-align: center;
}

.modal-header h2 { font-size: 1.8em; margin-bottom: 5px; }
.modal-header p { opacity: 0.95; font-size: 0.9em; }

.modal-body {
  padding: 30px;
}

.modal-body h3 {
  color: #2b3a67;
  margin-bottom: 20px;
  font-size: 1.3em;
}

.time-slots {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  margin-bottom: 25px;
}

.time-slot {
  padding: 15px;
  border: 2px solid #e0e0e0;
  border-radius: 12px;
  text-align: center;
  cursor: pointer;
  transition: all 0.3s ease;
  background: #f9f9f9;
  font-weight: 600;
  color: #555;
}

.time-slot:hover {
  border-color: #6ea8fe;
  background: #ecf4ff;
  transform: translateY(-2px);
}

.time-slot.selected {
  background: linear-gradient(135deg, #6ea8fe 0%, #9cc0ff 100%);
  color: white;
  border-color: #6ea8fe;
}

.time-slot.unavailable {
  opacity: 0.5;
  cursor: not-allowed;
  background: #f0f0f0;
}

.modal-footer {
  padding: 0 30px 30px;
  display: flex;
  gap: 15px;
}

.modal-btn {
  flex: 1;
  padding: 14px;
  border: none;
  border-radius: 50px;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.confirm-btn {
  background: linear-gradient(135deg, #6ea8fe 0%, #9cc0ff 100%);
  color: white;
}

.confirm-btn:hover:not(:disabled) {
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(110, 168, 254, 0.4);
}

.confirm-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.cancel-btn {
  background: #f0f0f0;
  color: #555;
}

.cancel-btn:hover {
  background: #e4e4e4;
}

.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
  opacity: 0.8;
  line-height: 1;
}

.close:hover {
  opacity: 1;
}


</style>
</head>
<body> 

<div class="container">
    <div class="header">
        <h1>Let's Connect & Support Each Other</h1>
        <p>You're not alone. Find a peer who truly understands and is here to listen</p>
        <button class="connect-btn" onclick="scrollToPeers()">Find Your Peer</button>
    </div>

    <div class="peers-grid" id="peers-section"></div>
</div>

<!-- Modal -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalPeerName"></h2>
            <p id="modalPeerSpeciality"></p>
        </div>
        <div class="modal-body">
            <h3>📅 Available Sessions</h3>
            <div class="time-slots" id="timeSlots"></div>
        </div>
        <div class="modal-footer">
            <button class="modal-btn cancel-btn" onclick="closeModal()">Cancel</button>
            <button class="modal-btn confirm-btn" id="confirmBtn" onclick="confirmBooking()" disabled>Confirm Booking</button>
        </div>
    </div>
</div>

<script>
let peersData = [];
let selectedSlotId = null;
let currentPeerId = null;

function scrollToPeers(){
    document.getElementById('peers-section').scrollIntoView({behavior:'smooth'});
}

// Fetch peers dynamically
fetch('get_peers.php')
.then(res => res.json())
.then(data => {
    peersData = data;
    const container = document.getElementById('peers-section');
    container.innerHTML = '';

    data.forEach(peer => {
        const div = document.createElement('div');
        div.className = 'peer-card';
        div.innerHTML = `
            <div class="peer-photo">👨‍🎓</div>
            <h3 class="peer-name">${peer.name}</h3>
            <p class="peer-speciality">${peer.speciality}</p>
            <span class="availability ${peer.availability}">
                ${peer.availability.charAt(0).toUpperCase() + peer.availability.slice(1)}
            </span>
            <div class="rating">
                <span class="stars">${'★'.repeat(Math.round(peer.rating))}</span>
                <span class="rating-number">${peer.rating}</span>
            </div>
            <button class="book-btn">Book</button>
        `;

        // Attach click event dynamically
        div.querySelector('.book-btn').addEventListener('click', () => openModal(peer.id));

        container.appendChild(div);
    });
});

// Modal functions
function openModal(peerId){
    currentPeerId = peerId;
    const peer = peersData.find(p => p.id === peerId);
    document.getElementById('modalPeerName').textContent = peer.name;
    document.getElementById('modalPeerSpeciality').textContent = peer.speciality;

    const container = document.getElementById('timeSlots');
    container.innerHTML = '';

    peer.slots.forEach(slot => {
        const div = document.createElement('div');
        div.className = 'time-slot' + (slot.available ? '' : ' unavailable');
        div.textContent = slot.slot_time;
        if(slot.available) div.addEventListener('click', () => selectSlot(slot.id, div));
        container.appendChild(div);
    });

    document.getElementById('bookingModal').style.display = 'block';
    selectedSlotId = null;
    document.getElementById('confirmBtn').disabled = true;
}

function selectSlot(slotId, element){
    document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
    element.classList.add('selected');
    selectedSlotId = slotId;
    document.getElementById('confirmBtn').disabled = false;
}

function closeModal(){
    document.getElementById('bookingModal').style.display = 'none';
    selectedSlotId = null;
}

// Confirm booking
function confirmBooking(){
    if(!selectedSlotId) return;
    fetch('book_slot.php', {
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({peer_id: currentPeerId, slot_id: selectedSlotId, email: 'student@example.com'})
    })
    .then(res => res.json())
    .then(data => {
        closeModal();
        if(data.success){
            swal("Success!", "Booking completed successfully!", "success")
            .then(()=> location.reload());
        } else {
            swal("Error!", data.message, "error");
        }
    });
}

window.onclick = function(event){
    const modal = document.getElementById('bookingModal');
    if(event.target == modal) closeModal();
}
</script>

</body>
</html>
