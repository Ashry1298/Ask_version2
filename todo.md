[*] register
[*] login
[ ] forget password
[ ] Notifications


[*] user can ask a question to another user
[*] user can show his own questions
[*] user can reply to a question
[*] user profile contains answered questions
[*] user can ask another user anonoumous 


============= MODELS =================

[*] User 
[*] Question 
User hasMany questions and questions are belongsTo one user
[ ] Followers

============= Relations ================
user -> questions      1 -> m //sender
user -> questions      1 -> m //reciever

-----------
followers
follower_id
user_id
--------

================TO STUDY=================
[ ] relations
[ ] Route Model Binding
[ ] form requests
[ ] laravel accessor and mutator
[ ] Model Scopes
[ ] seeders
[ ] factories