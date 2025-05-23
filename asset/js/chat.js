$(document).ready(function () {
          $('#chat-form').on('submit', function (e) {
              e.preventDefault(); // Ngăn reload trang

              const question = $('#question').val();
              if (question.trim() === '') return;

              $.post('include/chat_process.php', { question: question }, function (data) {
                  $('.messages').html(data); // Cập nhật đoạn chat mới
                  $('#question').val(''); // Xoá input sau khi gửi
              });
          });
      });