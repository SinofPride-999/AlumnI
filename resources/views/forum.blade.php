@extends('layouts.app')

@section('title', 'Alumni Forum - Alumni Connect')

@section('content')
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="{{ route('home') }}" class="logo">
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
                @foreach($categories as $category)
                <div class="category-card">
                    <div class="category-icon">
                        <i class="{{ $category->icon }}"></i>
                    </div>
                    <div class="category-info">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->description }}</p>
                        <div class="stats">
                            <span>{{ $category->topics_count }} Topics</span>
                            <span>{{ $category->posts_count }} Posts</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>

            <!-- Recent Discussions -->
            <section class="recent-discussions">
                <div class="section-header">
                    <h2 class="section-title">Recent Discussions</h2>
                    <div class="view-options">
                        <a href="{{ route('forum', ['sort' => 'newest']) }}" class="btn btn-text {{ request()->sort == 'newest' ? 'active' : '' }}">Newest</a>
                        <a href="{{ route('forum', ['sort' => 'popular']) }}" class="btn btn-text {{ request()->sort == 'popular' ? 'active' : '' }}">Popular</a>
                        <a href="{{ route('forum', ['sort' => 'unanswered']) }}" class="btn btn-text {{ request()->sort == 'unanswered' ? 'active' : '' }}">Unanswered</a>
                    </div>
                </div>
                
                <div class="discussion-list">
                    @foreach($topics as $topic)
                    <div class="discussion-card">
                        <div class="discussion-votes">
                            <button class="vote-btn upvote">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count">{{ $topic->votes }}</span>
                            <button class="vote-btn downvote">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge {{ $topic->category->slug }}">{{ $topic->category->name }}</span>
                                <h3><a href="{{ route('forum-topic', $topic->id) }}">{{ $topic->title }}</a></h3>
                            </div>
                            <p class="discussion-excerpt">{{ Str::limit($topic->content, 150) }}</p>
                            <div class="discussion-meta">
                                <div class="author-info">
                                    <img src="{{ $topic->author->photo_url }}" alt="User avatar">
                                    <span>{{ $topic->author->name }}</span>
                                    <span class="graduation">Class of {{ $topic->author->graduation_year }}</span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> {{ $topic->replies_count }} replies</span>
                                    <span><i class="far fa-eye"></i> {{ $topic->views }} views</span>
                                    <span class="post-time">{{ $topic->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    {{ $topics->links() }}
                </div>
            </section>
            
            <!-- Popular Alumni -->
            <section class="popular-alumni">
                <h2 class="section-title">Popular Alumni Contributors</h2>
                <div class="alumni-grid">
                    @foreach($popularContributors as $contributor)
                    <div class="alumni-card">
                        <img src="{{ $contributor->photo_url }}" alt="Alumni photo">
                        <h3>{{ $contributor->name }}</h3>
                        <p class="graduation">Class of {{ $contributor->graduation_year }} · {{ $contributor->major }}</p>
                        <p class="current">{{ $contributor->current_position }} at {{ $contributor->current_company }}</p>
                        <div class="stats">
                            <span>{{ $contributor->posts_count }} Posts</span>
                            <span>{{ $contributor->likes_count }} Likes</span>
                        </div>
                        <button class="btn btn-text">
                            <i class="fas fa-user-plus"></i> Connect
                        </button>
                    </div>
                    @endforeach
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
                <p>&copy; {{ date('Y') }} AlumnI. All rights reserved. Developed by Group 12.</p>
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
                <form id="newTopicForm" method="POST" action="{{ route('forum.topic.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="topic-title">Topic Title</label>
                        <input type="text" id="topic-title" name="title" placeholder="What's your discussion about?" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="topic-category">Category</label>
                        <select id="topic-category" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="topic-content">Discussion Content</label>
                        <textarea id="topic-content" name="content" rows="6" placeholder="Write your post here..." required></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-text" id="cancelTopicBtn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post Discussion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/forum.js') }}"></script>
@endsection