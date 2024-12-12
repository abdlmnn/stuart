<?php
    if(isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];
        echo "<script> 
            window.onload = function() {

                // modal that will display
                var modal = document.createElement('div');
                    modal.setAttribute('id', 'messageModal');
                    modal.style.position = 'fixed'; 
                    modal.style.top = '70px';  
                    modal.style.right = '35px';
                    modal.style.zIndex = '999';
                    modal.style.backgroundColor = 'none';
                    modal.style.display = 'flex';
                    modal.style.justifyContent = 'center';
                    modal.style.alignItems = 'center';
                    modal.style.opacity = '0'; 
                    // modal.style.transition = 'opacity 0.5s ease'; 
                
                // content modal 
                var modalContent = document.createElement('div');
                    modalContent.style.backgroundColor = '#fff';
                    modalContent.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.5)';
                    modalContent.style.padding = '20px';
                    modalContent.style.borderRadius = '10px';
                    modalContent.style.textAlign = 'center';
                    modalContent.style.maxWidth = '500px';
                    // modalContent.style.margin = '0 auto';
                    // modalContent.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.2)';
                    modalContent.style.transform = 'scale(0.9)';
                    modalContent.style.transition = 'transform 0.3s ease-in-out'; 

                
                var messageText = document.createElement('p');
                    messageText.textContent = '$message';  
                    messageText.style.fontSize = '14px';
                    messageText.style.fontWeight = 'bold';
                
                // Append message text to modal content
                    modalContent.appendChild(messageText);
                
                // Append modal content to modal
                    modal.appendChild(modalContent);
                    document.body.appendChild(modal);
                
                // Trigger opacity transition to make modal fade in
                    setTimeout(function() {
                        modal.style.opacity = '1';
                        modalContent.style.transform = 'scale(1)';
                    }, 50);

                // Close modal when user clicks anywhere on the screen (outside the modal content)
                    modal.onclick = function(event) {
                        // Check if the click was outside the modal content
                        if (event.target === modal) {
                            document.getElementById('messageModal').remove();
                        }
                    };

                // Auto-remove the modal after 5 seconds (5000 ms)
                    setTimeout(function() {
                        document.getElementById('messageModal').remove();
                    }, 5000);
            };
          </script>";
          
        unset($_SESSION['message']);
    }
?>