<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Forum - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/forum.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.html" class="logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>AlumnI</span>
                    </a>
                </div>
                
                <div class="nav-actions">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    <div class="user-menu">
                        <button class="user-avatar" id="userMenuBtn">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="forum-content">
        <div class="container">
            <!-- Forum Header -->
            <section class="forum-header">
                <div class="header-content">
                    <h1>Alumni Forum</h1>
                    <p>Connect with fellow alumni, share experiences, and discuss topics of interest</p>
                </div>
                <button class="btn btn-primary" id="newTopicBtn">
                    <i class="fas fa-plus"></i> New Topic
                </button>
            </section>

            <!-- Forum Categories -->
            <section class="forum-categories">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="category-info">
                        <h3>Career Discussions</h3>
                        <p>Share job opportunities, career advice, and professional development tips</p>
                        <div class="stats">
                            <span>245 Topics</span>
                            <span>1.2K Posts</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="category-info">
                        <h3>Campus Memories</h3>
                        <p>Relive your university days and share stories from your time on campus</p>
                        <div class="stats">
                            <span>189 Topics</span>
                            <span>856 Posts</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="category-info">
                        <h3>Class Reunions</h3>
                        <p>Organize and discuss upcoming class reunions and alumni events</p>
                        <div class="stats">
                            <span>76 Topics</span>
                            <span>324 Posts</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="category-info">
                        <h3>Industry Groups</h3>
                        <p>Connect with alumni in your industry for networking and collaboration</p>
                        <div class="stats">
                            <span>132 Topics</span>
                            <span>587 Posts</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recent Discussions -->
            <section class="recent-discussions">
                <div class="section-header">
                    <h2 class="section-title">Recent Discussions</h2>
                    <div class="view-options">
                        <button class="btn btn-text active">Newest</button>
                        <button class="btn btn-text">Popular</button>
                        <button class="btn btn-text">Unanswered</button>
                    </div>
                </div>
                
                <div class="discussion-list">
                    <!-- Discussion 1 -->
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">24</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="forum-topic.html">Looking for software engineers at our startup</a></h3>
                            </div>
                            <p class="discussion-excerpt">Our alumni-founded startup is hiring! We're looking for 2-3 software engineers with 3+ years experience in JavaScript and React. Competitive salary and equity offered.</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="User avatar">
                                    <span>David Kim</span>
                                    <span class="graduation">Class of 2015</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 14 replies</span>
                                    <span><i class="far fa-eye"></i> 128 views</span>
                                    <span class="post-time">2 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Discussion 2 -->
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">18</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge campus">Campus</span>
                                <h3><a href="forum-topic.html">Remembering Professor Johnson's lectures</a></h3>
                            </div>
                            <p class="discussion-excerpt">I was going through my old notes and found some gems from Prof. Johnson's algorithms class. Who else remembers his famous "when in doubt, use a hash table" advice?</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="User avatar">
                                    <span>Sarah Chen</span>
                                    <span class="graduation">Class of 2012</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 23 replies</span>
                                    <span><i class="far fa-eye"></i> 215 views</span>
                                    <span class="post-time">1 day ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Discussion 3 -->
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">9</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge industry">Industry</span>
                                <h3><a href="forum-topic.html">Tech salaries in 2025 - what to expect?</a></h3>
                            </div>
                            <p class="discussion-excerpt">With the current market trends, what are people seeing for senior software engineer salaries at FAANG companies? I'm considering a move but want to benchmark properly.</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User avatar">
                                    <span>Michael Rodriguez</span>
                                    <span class="graduation">Class of 2018</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 7 replies</span>
                                    <span><i class="far fa-eye"></i> 89 views</span>
                                    <span class="post-time">2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Discussion 4 -->
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">32</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge reunion">Reunion</span>
                                <h3><a href="forum-topic.html">Class of 2015 - 10 Year Reunion Planning</a></h3>
                            </div>
                            <p class="discussion-excerpt">Let's start planning our 10 year reunion! Please vote on potential dates and share ideas for activities. I'm thinking a campus tour followed by dinner at the old student center.</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="User avatar">
                                    <span>Jessica Wong</span>
                                    <span class="graduation">Class of 2015</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 41 replies</span>
                                    <span><i class="far fa-eye"></i> 302 views</span>
                                    <span class="post-time">3 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Discussion 5 -->
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">5</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="forum-topic.html">Transitioning from engineering to product management</a></h3>
                            </div>
                            <p class="discussion-excerpt">Has anyone made the switch from software engineering to product management? Looking for advice on making the transition and what skills I should focus on developing.</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="https://randomuser.me/api/portraits/men/36.jpg" alt="User avatar">
                                    <span>Robert Johnson</span>
                                    <span class="graduation">Class of 2019</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 3 replies</span>
                                    <span><i class="far fa-eye"></i> 76 views</span>
                                    <span class="post-time">5 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <button class="btn btn-text" disabled>
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                    <div class="page-numbers">
                        <button class="btn btn-text active">1</button>
                        <button class="btn btn-text">2</button>
                        <button class="btn btn-text">3</button>
                        <span>...</span>
                        <button class="btn btn-text">5</button>
                    </div>
                    <button class="btn btn-text">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
            
            <!-- Popular Alumni -->
            <section class="popular-alumni">
                <h2 class="section-title">Popular Alumni Contributors</h2>
                <div class="alumni-grid">
                    <div class="alumni-card">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Alumni photo">
                        <h3>Dr. Angela Smith</h3>
                        <p class="graduation">Class of 2010 · Computer Science</p>
                        <p class="current">Professor at Stanford University</p>
                        <div class="stats">
                            <span>142 Posts</span>
                            <span>2.4K Likes</span>
                        </div>
                        <button class="btn btn-text">
                            <i class="fas fa-user-plus"></i> Connect
                        </button>
                    </div>
                    
                    <div class="alumni-card">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alumni photo">
                        <h3>Mark Williams</h3>
                        <p class="graduation">Class of 2008 · Business</p>
                        <p class="current">CEO at GreenTech Solutions</p>
                        <div class="stats">
                            <span>98 Posts</span>
                            <span>1.8K Likes</span>
                        </div>
                        <button class="btn btn-text">
                            <i class="fas fa-user-plus"></i> Connect
                        </button>
                    </div>
                    
                    <div class="alumni-card">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Alumni photo">
                        <h3>Priya Patel</h3>
                        <p class="graduation">Class of 2015 · Electrical Engineering</p>
                        <p class="current">Senior Engineer at Tesla</p>
                        <div class="stats">
                            <span>76 Posts</span>
                            <span>1.2K Likes</span>
                        </div>
                        <button class="btn btn-text">
                            <i class="fas fa-user-plus"></i> Connect
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AlumnI</h3>
                    <p>Bridging the gap between alumni and their alma mater through technology and community.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#team">Team</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

    <!-- New Topic Modal -->
    <div class="modal" id="newTopicModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Discussion</h2>
                <button class="close-btn" id="closeModalBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="newTopicForm">
                    <div class="form-group">
                        <label for="topic-title">Topic Title</label>
                        <input type="text" id="topic-title" placeholder="What's your discussion about?" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="topic-category">Category</label>
                        <select id="topic-category" required>
                            <option value="">Select a category</option>
                            <option value="career">Career Discussions</option>
                            <option value="campus">Campus Memories</option>
                            <option value="reunion">Class Reunions</option>
                            <option value="industry">Industry Groups</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="topic-content">Discussion Content</label>
                        <textarea id="topic-content" rows="6" placeholder="Write your post here..." required></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-text" id="cancelTopicBtn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post Discussion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/forum.js"></script>
</body>
</html>