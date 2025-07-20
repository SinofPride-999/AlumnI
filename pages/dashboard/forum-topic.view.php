<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Topic - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/forum-topic.css">
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
    <main class="forum-topic-content">
        <div class="container">
            <!-- Breadcrumb Navigation -->
            <nav class="breadcrumb">
                <a href="forum.html">Forum</a>
                <i class="fas fa-chevron-right"></i>
                <a href="forum.html">Career Discussions</a>
                <i class="fas fa-chevron-right"></i>
                <span>Looking for software engineers at our startup</span>
            </nav>

            <!-- Discussion Header -->
            <section class="discussion-header">
                <div class="header-content">
                    <div class="category-badge career">Career</div>
                    <h1>Looking for software engineers at our startup</h1>
                    <div class="discussion-meta">
                        <div class="author-info">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Author avatar">
                            <div>
                                <span class="author-name">David Kim</span>
                                <span class="author-title">Class of 2015 · Founder at TechStart</span>
                            </div>
                        </div>
                        <div class="post-info">
                            <span class="post-time">Posted 2 days ago</span>
                            <span class="post-views"><i class="far fa-eye"></i> 128 views</span>
                        </div>
                    </div>
                </div>
                <div class="discussion-actions">
                    <button class="btn btn-text">
                        <i class="far fa-bookmark"></i> Save
                    </button>
                    <button class="btn btn-text">
                        <i class="fas fa-share-alt"></i> Share
                    </button>
                </div>
            </section>

            <!-- Discussion Content -->
            <section class="discussion-content">
                <div class="post-content">
                    <p>Hello fellow alumni! I'm excited to announce that our startup, TechStart, is looking to hire 2-3 software engineers to join our growing team. We're an alumni-founded company building innovative SaaS solutions for the education sector.</p>
                    
                    <h3>About the Position</h3>
                    <p>We're looking for engineers with 3+ years of professional experience in JavaScript and React. You'll be working on our core product, helping to architect new features and improve system performance.</p>
                    
                    <h3>Requirements</h3>
                    <ul>
                        <li>Strong proficiency in JavaScript (ES6+)</li>
                        <li>3+ years experience with React and Redux</li>
                        <li>Experience with Node.js and RESTful APIs</li>
                        <li>Familiarity with modern frontend build pipelines</li>
                        <li>Bachelor's degree in Computer Science or related field</li>
                    </ul>
                    
                    <h3>What We Offer</h3>
                    <ul>
                        <li>Competitive salary ($120K-$150K based on experience)</li>
                        <li>Equity stake in the company</li>
                        <li>Flexible work arrangements (remote or hybrid)</li>
                        <li>Health, dental, and vision insurance</li>
                        <li>401(k) matching</li>
                    </ul>
                    
                    <p>If you're interested or know someone who might be, please reach out! Alumni candidates will receive priority consideration.</p>
                    
                    <div class="post-tags">
                        <span class="tag">#hiring</span>
                        <span class="tag">#software-engineer</span>
                        <span class="tag">#javascript</span>
                        <span class="tag">#react</span>
                    </div>
                </div>
                
                <div class="post-actions">
                    <div class="vote-controls">
                        <button class="vote-btn upvote">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                        <span class="vote-count">24</span>
                        <button class="vote-btn downvote">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <button class="btn btn-text reply-btn">
                        <i class="far fa-comment"></i> Reply
                    </button>
                </div>
            </section>

            <!-- Replies Section -->
            <section class="replies-section">
                <div class="section-header">
                    <h2>14 Replies</h2>
                    <div class="sort-options">
                        <label for="sort-replies">Sort by:</label>
                        <select id="sort-replies">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="votes">Most Votes</option>
                        </select>
                    </div>
                </div>
                
                <!-- Reply 1 -->
                <div class="reply-card">
                    <div class="reply-votes">
                        <button class="vote-btn upvote">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                        <span class="vote-count">8</span>
                        <button class="vote-btn downvote">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="reply-content">
                        <div class="reply-header">
                            <div class="author-info">
                                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="User avatar">
                                <div>
                                    <span class="author-name">Maria Gonzalez</span>
                                    <span class="author-title">Class of 2016 · Senior Engineer at Google</span>
                                </div>
                            </div>
                            <span class="reply-time">1 day ago</span>
                        </div>
                        <div class="reply-text">
                            <p>This sounds like a great opportunity! I worked with David during our time at university and can vouch for his technical skills and leadership. The tech stack looks solid too.</p>
                            
                            <p>For anyone considering applying, I'd recommend brushing up on your system design knowledge as that's often a focus in startup interviews.</p>
                        </div>
                        <div class="reply-actions">
                            <button class="btn btn-text">
                                <i class="far fa-comment"></i> Reply
                            </button>
                            <button class="btn btn-text">
                                <i class="fas fa-flag"></i> Report
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Reply 2 -->
                <div class="reply-card">
                    <div class="reply-votes">
                        <button class="vote-btn upvote">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                        <span class="vote-count">5</span>
                        <button class="vote-btn downvote">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="reply-content">
                        <div class="reply-header">
                            <div class="author-info">
                                <img src="https://randomuser.me/api/portraits/men/31.jpg" alt="User avatar">
                                <div>
                                    <span class="author-name">Robert Chen</span>
                                    <span class="author-title">Class of 2019 · Software Engineer</span>
                                </div>
                            </div>
                            <span class="reply-time">1 day ago</span>
                        </div>
                        <div class="reply-text">
                            <p>I'm interested in applying! I have 4 years of experience with React and Node.js, currently working at a mid-sized tech company. Would you consider candidates who are strong in TypeScript but have less experience with Redux?</p>
                            
                            <p>Also, is there a specific application process or should we just DM you our resumes?</p>
                        </div>
                        <div class="reply-actions">
                            <button class="btn btn-text">
                                <i class="far fa-comment"></i> Reply
                            </button>
                            <button class="btn btn-text">
                                <i class="fas fa-flag"></i> Report
                            </button>
                        </div>
                        
                        <!-- Nested Reply -->
                        <div class="nested-replies">
                            <div class="reply-card">
                                <div class="reply-votes">
                                    <button class="vote-btn upvote">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                    <span class="vote-count">3</span>
                                    <button class="vote-btn downvote">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="reply-content">
                                    <div class="reply-header">
                                        <div class="author-info">
                                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="User avatar">
                                            <div>
                                                <span class="author-name">David Kim</span>
                                                <span class="author-title">Original Poster · Class of 2015</span>
                                            </div>
                                        </div>
                                        <span class="reply-time">20 hours ago</span>
                                    </div>
                                    <div class="reply-text">
                                        <p>@Robert Chen TypeScript is definitely a plus! We're actually migrating some of our codebase to TypeScript, so that experience would be valuable. Regarding Redux, we're open to candidates with experience in similar state management solutions.</p>
                                        
                                        <p>Please email your resume to careers@techstart.com with "Alumni Applicant" in the subject line. I'll make sure it gets reviewed promptly.</p>
                                    </div>
                                    <div class="reply-actions">
                                        <button class="btn btn-text">
                                            <i class="far fa-comment"></i> Reply
                                        </button>
                                        <button class="btn btn-text">
                                            <i class="fas fa-flag"></i> Report
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reply 3 -->
                <div class="reply-card">
                    <div class="reply-votes">
                        <button class="vote-btn upvote">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                        <span class="vote-count">2</span>
                        <button class="vote-btn downvote">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="reply-content">
                        <div class="reply-header">
                            <div class="author-info">
                                <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="User avatar">
                                <div>
                                    <span class="author-name">Jessica Wong</span>
                                    <span class="author-title">Class of 2017 · Engineering Manager</span>
                                </div>
                            </div>
                            <span class="reply-time">18 hours ago</span>
                        </div>
                        <div class="reply-text">
                            <p>Great to see alumni supporting each other in their careers! I'll share this with my network - we have some talented engineers who might be looking for new opportunities.</p>
                            
                            <p>David, does your company offer any internship opportunities for current students? We have some strong candidates in our CS program who could benefit from startup experience.</p>
                        </div>
                        <div class="reply-actions">
                            <button class="btn btn-text">
                                <i class="far fa-comment"></i> Reply
                            </button>
                            <button class="btn btn-text">
                                <i class="fas fa-flag"></i> Report
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Load More Replies -->
                <div class="load-more">
                    <button class="btn btn-text">
                        <i class="fas fa-chevron-down"></i> Load More Replies
                    </button>
                </div>
            </section>

            <!-- Reply Form -->
            <section class="reply-form-section">
                <h2>Post Your Reply</h2>
                <form id="replyForm">
                    <div class="form-group">
                        <textarea id="reply-content" placeholder="Write your reply here..." required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-text" id="cancelReplyBtn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post Reply</button>
                    </div>
                </form>
            </section>

            <!-- Similar Discussions -->
            <section class="similar-discussions">
                <h2 class="section-title">Similar Discussions</h2>
                <div class="discussion-list">
                    <div class="discussion-card">
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="#">Tech interview preparation resources</a></h3>
                            </div>
                            <p class="discussion-excerpt">Sharing my curated list of resources that helped me land offers from FAANG companies...</p>
                            <div class="discussion-meta">
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 32 replies</span>
                                    <span class="post-time">1 week ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="discussion-card">
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="#">Remote work opportunities for alumni</a></h3>
                            </div>
                            <p class="discussion-excerpt">Compiling a list of companies that are hiring remote workers, with alumni referral options...</p>
                            <div class="discussion-meta">
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 18 replies</span>
                                    <span class="post-time">2 weeks ago</span>
                                </div>
                            </div>
                        </div>
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

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/forum-topic.js"></script>
</body>
</html>