<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuantumAdmin | Ultimate E-Commerce Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #c7d2fe;
            --secondary: #10b981;
            --secondary-light: #d1fae5;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --info: #3b82f6;
            --info-light: #dbeafe;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --gray-light: #e2e8f0;
            --gray-dark: #64748b;
            --sidebar-width: 280px;
            --header-height: 70px;
            --transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: var(--shadow);
        }

        /* Main layout */
        .dashboard {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            grid-row: 1 / -1;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            position: relative;
            z-index: 100;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo-icon {
            font-size: 2rem;
            color: white;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex-grow: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.95rem;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: 600;
        }

        .nav-item i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-weight: 600;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Header */
        .header {
            grid-column: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            background: white;
            box-shadow: var(--shadow-sm);
            z-index: 50;
            position: sticky;
            top: 0;
        }

        .search-bar {
            position: relative;
            width: 400px;
            max-width: 100%;
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: none;
            background: var(--gray-light);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-bar input:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 2px var(--primary);
        }

        .search-bar i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .search-results {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            max-height: 400px;
            overflow-y: auto;
            z-index: 100;
            display: none;
        }

        .search-result-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-result-item:hover {
            background: var(--gray-light);
        }

        .search-result-item i {
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification {
            position: relative;
            color: var(--gray-dark);
            cursor: pointer;
            transition: var(--transition);
        }

        .notification:hover {
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.6rem;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            transition: var(--transition);
        }

        .user-profile:hover .user-avatar {
            transform: scale(1.05);
        }

        .user-name {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            width: 200px;
            padding: 0.5rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 100;
        }

        .user-profile.active .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--dark);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background: var(--gray-light);
            color: var(--primary);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            color: var(--gray);
        }

        .dropdown-divider {
            height: 1px;
            background: var(--gray-light);
            margin: 0.5rem 0;
        }

        /* Main content */
        .main-content {
            grid-column: 2;
            padding: 2rem;
            overflow-y: auto;
            background: #f1f5f9;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
        }

        .page-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .btn-secondary {
            background: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background: #0ea371;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gray);
            color: var(--dark);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        /* Page content sections */
        .page-section {
            display: none;
            animation: fadeIn 0.3s ease-out;
        }

        .page-section.active {
            display: block;
        }

        /* Metrics Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            padding: 1.5rem;
            border-radius: 12px;
            transition: var(--transition);
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .metric-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .metric-title {
            font-size: 0.9rem;
            color: var(--gray-dark);
            font-weight: 500;
        }

        .metric-card i {
            font-size: 1.2rem;
            color: var(--primary);
            background: var(--primary-light);
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .metric-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .metric-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .metric-change.positive {
            color: var(--secondary);
        }

        .metric-change.negative {
            color: var(--danger);
        }

        .metric-chart {
            height: 4px;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 2px;
            overflow: hidden;
        }

        .chart-line {
            height: 100%;
            width: var(--percentage);
            background: var(--primary);
            border-radius: 2px;
            transition: width 1s ease-in-out;
        }

        /* Main Chart */
        .main-chart {
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .chart-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-time {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            border: none;
            background: var(--gray-light);
            color: var(--gray-dark);
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-time.active {
            background: var(--primary);
            color: white;
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        .chart-placeholder {
            height: 100%;
            width: 100%;
            position: relative;
        }

        .chart-grid {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .grid-line {
            height: 1px;
            background: rgba(0, 0, 0, 0.05);
        }

        .chart-bars {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 90%;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            gap: 1%;
        }

        .chart-bar {
            width: 12%;
            height: var(--height);
            background: var(--primary);
            border-radius: 6px 6px 0 0;
            position: relative;
            transition: var(--transition);
        }

        .chart-bar:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }

        .chart-bar::after {
            content: attr(data-value);
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--dark);
            opacity: 0;
            transition: var(--transition);
        }

        .chart-bar:hover::after {
            opacity: 1;
        }

        /* Content Columns */
        .content-columns {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .content-card {
            padding: 1.5rem;
            border-radius: 12px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .view-all {
            font-size: 0.85rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .view-all:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Order List */
        .order-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .order-item:hover {
            background: rgba(0, 0, 0, 0.01);
        }

        .order-info {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .order-id {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .order-customer {
            font-size: 0.8rem;
            color: var(--gray-dark);
        }

        .order-date {
            font-size: 0.8rem;
            color: var(--gray-dark);
            width: 120px;
            text-align: center;
        }

        .order-amount {
            font-weight: 600;
            width: 80px;
            text-align: right;
        }

        .order-status {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            width: 90px;
            text-align: center;
        }

        .order-status.completed {
            background: var(--secondary-light);
            color: var(--secondary);
        }

        .order-status.shipped {
            background: var(--primary-light);
            color: var(--primary);
        }

        .order-status.processing {
            background: var(--warning-light);
            color: var(--warning);
        }

        .order-status.pending {
            background: var(--info-light);
            color: var(--info);
        }

        .order-status.cancelled {
            background: var(--danger-light);
            color: var(--danger);
        }

        /* Product List */
        .product-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .product-item:hover {
            background: rgba(0, 0, 0, 0.01);
        }

        .product-image {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            overflow: hidden;
            background: var(--gray-light);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .product-sales {
            font-size: 0.8rem;
            color: var(--gray-dark);
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.85rem;
            color: var(--warning);
        }

        /* Full Table */
        .full-table {
            padding: 1.5rem;
            border-radius: 12px;
        }

        .table-actions {
            display: flex;
            gap: 0.75rem;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--gray-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: rgba(0, 0, 0, 0.02);
        }

        td {
            padding: 1rem;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: rgba(0, 0, 0, 0.01);
        }

        .customer-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .customer-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge.completed {
            background: var(--secondary-light);
            color: var(--secondary);
        }

        .status-badge.shipped {
            background: var(--primary-light);
            color: var(--primary);
        }

        .status-badge.processing {
            background: var(--warning-light);
            color: var(--warning);
        }

        .status-badge.pending {
            background: var(--info-light);
            color: var(--info);
        }

        .status-badge.cancelled {
            background: var(--danger-light);
            color: var(--danger);
        }

        .table-action {
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            transition: var(--transition);
        }

        .table-action:hover {
            background: var(--gray-light);
            color: var(--primary);
        }

        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(20px);
            transition: var(--transition);
        }

        .modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--danger);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-light);
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-light);
        }

        /* Mobile menu toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--dark);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                bottom: 0;
                transition: var(--transition);
            }

            .sidebar.active {
                left: 0;
            }

            .dashboard {
                grid-template-columns: 1fr;
            }

            .header {
                grid-column: 1;
            }

            .main-content {
                grid-column: 1;
            }

            .mobile-menu-toggle {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 0 1rem;
            }

            .main-content {
                padding: 1.5rem 1rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .page-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .content-columns {
                grid-template-columns: 1fr;
            }

            .search-bar {
                width: 200px;
            }

            .user-name {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .metrics-grid {
                grid-template-columns: 1fr;
            }

            .search-bar {
                display: none;
            }

            .user-actions {
                gap: 1rem;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        #ap\u0070{di\u0073pl\u0061y:no\u006e\u0065}.d\u0061sh\u0062o\u0061rd{backgro\u0075nd:#f1f5f9!imp\u006frtant
        }
    </style>
</head>
<body>


    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo" data-section="dashboard">
                    <i class="fas fa-atom logo-icon"></i>
                    <span>QuantumAdmin</span>
                </a>
            </div>
            
            <nav class="nav-menu">
                <a href="#" class="nav-item active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item" data-section="products">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Products</span>
                    <span class="nav-badge">12</span>
                </a>
                <a href="#" class="nav-item" data-section="customers">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
                <a href="#" class="nav-item" data-section="orders">
                    <i class="fas fa-truck"></i>
                    <span>Orders</span>
                    <span class="nav-badge">5</span>
                </a>
                <a href="#" class="nav-item" data-section="analytics">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" class="nav-item" data-section="discounts">
                    <i class="fas fa-tags"></i>
                    <span>Discounts</span>
                </a>
                <a href="#" class="nav-item" data-section="reviews">
                    <i class="fas fa-comment-alt"></i>
                    <span>Reviews</span>
                </a>
                <a href="#" class="nav-item" data-section="settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="#" class="nav-item" data-section="support">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </div>
        </aside>

        <!-- Header -->
        <header class="header">
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search products, orders, customers..." id="search-input">
                <div class="search-results" id="search-results">
                    <div class="search-result-item">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Wireless Headphones Pro</span>
                    </div>
                    <div class="search-result-item">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Order #ORD-7845</span>
                    </div>
                    <div class="search-result-item">
                        <i class="fas fa-user"></i>
                        <span>Sarah Johnson</span>
                    </div>
                    <div class="search-result-item">
                        <i class="fas fa-tag"></i>
                        <span>Summer Sale Discount</span>
                    </div>
                </div>
            </div>
            
            <div class="user-actions">
                <div class="notification" id="notifications-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </div>
                <div class="notification" id="messages-btn">
                    <i class="fas fa-envelope"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile" id="user-profile">
                    <div class="user-avatar">JD</div>
                    <span class="user-name">John Doe</span>
                    <i class="fas fa-chevron-down"></i>
                    
                    <div class="user-dropdown">
                        <a href="#" class="dropdown-item" data-section="profile">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="dropdown-item" data-section="settings">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item" id="messages-dropdown">
                            <i class="fas fa-envelope"></i>
                            <span>Messages</span>
                            <span class="notification-badge" style="margin-left: auto;">3</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" id="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Dashboard Section -->
            <div class="page-section active" id="dashboard-section">
                <div class="page-header">
                    <h1 class="page-title">Dashboard Overview</h1>
                    <div class="page-actions">
                        <button class="btn btn-outline" id="export-btn">
                            <i class="fas fa-download"></i>
                            Export
                        </button>
                        <button class="btn btn-primary" id="add-product-btn">
                            <i class="fas fa-plus"></i>
                            Add Product
                        </button>
                    </div>
                </div>
                
                <!-- Metrics Grid -->
                <div class="metrics-grid">
                    <!-- Metric Card 1 -->
                    <div class="metric-card glass">
                        <div class="metric-header">
                            <span class="metric-title">Total Revenue</span>
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="metric-value">$124,568</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>12.5% from last month</span>
                        </div>
                        <div class="metric-chart">
                            <div class="chart-line" style="--percentage: 75%"></div>
                        </div>
                    </div>

                    <!-- Metric Card 2 -->
                    <div class="metric-card glass">
                        <div class="metric-header">
                            <span class="metric-title">New Orders</span>
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="metric-value">1,245</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>8.3% from last month</span>
                        </div>
                        <div class="metric-chart">
                            <div class="chart-line" style="--percentage: 60%"></div>
                        </div>
                    </div>

                    <!-- Metric Card 3 -->
                    <div class="metric-card glass">
                        <div class="metric-header">
                            <span class="metric-title">Customer Growth</span>
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="metric-value">3,456</div>
                        <div class="metric-change negative">
                            <i class="fas fa-arrow-down"></i>
                            <span>2.1% from last month</span>
                        </div>
                        <div class="metric-chart">
                            <div class="chart-line" style="--percentage: 45%"></div>
                        </div>
                    </div>

                    <!-- Metric Card 4 -->
                    <div class="metric-card glass">
                        <div class="metric-header">
                            <span class="metric-title">Conversion Rate</span>
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="metric-value">3.2%</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>0.8% from last month</span>
                        </div>
                        <div class="metric-chart">
                            <div class="chart-line" style="--percentage: 32%"></div>
                        </div>
                    </div>
                </div>

                <!-- Main Chart -->
                <div class="main-chart glass">
                    <div class="chart-header">
                        <h3>Revenue Analytics</h3>
                        <div class="chart-actions">
                            <button class="btn-time active">7D</button>
                            <button class="btn-time">1M</button>
                            <button class="btn-time">3M</button>
                            <button class="btn-time">1Y</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <!-- This would be replaced with a real chart in production -->
                        <div class="chart-placeholder">
                            <div class="chart-grid">
                                <div class="grid-line"></div>
                                <div class="grid-line"></div>
                                <div class="grid-line"></div>
                                <div class="grid-line"></div>
                            </div>
                            <div class="chart-bars">
                                <div class="chart-bar" style="--height: 30%" data-value="$12.4k"></div>
                                <div class="chart-bar" style="--height: 60%" data-value="$24.8k"></div>
                                <div class="chart-bar" style="--height: 45%" data-value="$18.6k"></div>
                                <div class="chart-bar" style="--height: 80%" data-value="$33.2k"></div>
                                <div class="chart-bar" style="--height: 65%" data-value="$26.9k"></div>
                                <div class="chart-bar" style="--height: 90%" data-value="$37.3k"></div>
                                <div class="chart-bar" style="--height: 75%" data-value="$31.1k"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Columns -->
                <div class="content-columns">
                    <!-- Recent Orders -->
                    <div class="content-column">
                        <div class="content-card glass">
                            <div class="card-header">
                                <h3>Recent Orders</h3>
                                <a href="#" class="view-all" data-section="orders">View All</a>
                            </div>
                            <div class="order-list">
                                <div class="order-item" data-order="7845">
                                    <div class="order-info">
                                        <div class="order-id">#ORD-7845</div>
                                        <div class="order-customer">Sarah Johnson</div>
                                    </div>
                                    <div class="order-date">Today, 10:45 AM</div>
                                    <div class="order-amount">$245.99</div>
                                    <div class="order-status completed">Completed</div>
                                </div>
                                <div class="order-item" data-order="7844">
                                    <div class="order-info">
                                        <div class="order-id">#ORD-7844</div>
                                        <div class="order-customer">Michael Chen</div>
                                    </div>
                                    <div class="order-date">Today, 09:30 AM</div>
                                    <div class="order-amount">$189.50</div>
                                    <div class="order-status shipped">Shipped</div>
                                </div>
                                <div class="order-item" data-order="7843">
                                    <div class="order-info">
                                        <div class="order-id">#ORD-7843</div>
                                        <div class="order-customer">Emma Williams</div>
                                    </div>
                                    <div class="order-date">Today, 08:15 AM</div>
                                    <div class="order-amount">$320.00</div>
                                    <div class="order-status processing">Processing</div>
                                </div>
                                <div class="order-item" data-order="7842">
                                    <div class="order-info">
                                        <div class="order-id">#ORD-7842</div>
                                        <div class="order-customer">David Kim</div>
                                    </div>
                                    <div class="order-date">Yesterday, 5:30 PM</div>
                                    <div class="order-amount">$156.75</div>
                                    <div class="order-status completed">Completed</div>
                                </div>
                                <div class="order-item" data-order="7841">
                                    <div class="order-info">
                                        <div class="order-id">#ORD-7841</div>
                                        <div class="order-customer">Lisa Rodriguez</div>
                                    </div>
                                    <div class="order-date">Yesterday, 3:45 PM</div>
                                    <div class="order-amount">$275.30</div>
                                    <div class="order-status shipped">Shipped</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Products -->
                    <div class="content-column">
                        <div class="content-card glass">
                            <div class="card-header">
                                <h3>Top Products</h3>
                                <a href="#" class="view-all" data-section="products">View All</a>
                            </div>
                            <div class="product-list">
                                <div class="product-item" data-product="1">
                                    <div class="product-image">
                                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Wireless Headphones Pro</div>
                                        <div class="product-sales">245 sales</div>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.8</span>
                                    </div>
                                </div>
                                <div class="product-item" data-product="2">
                                    <div class="product-image">
                                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Smart Watch X4</div>
                                        <div class="product-sales">189 sales</div>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.6</span>
                                    </div>
                                </div>
                                <div class="product-item" data-product="3">
                                    <div class="product-image">
                                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Premium Headphones</div>
                                        <div class="product-sales">176 sales</div>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.7</span>
                                    </div>
                                </div>
                                <div class="product-item" data-product="4">
                                    <div class="product-image">
                                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Running Shoes Pro</div>
                                        <div class="product-sales">152 sales</div>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <div class="product-item" data-product="5">
                                    <div class="product-image">
                                        <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Designer Sunglasses</div>
                                        <div class="product-sales">138 sales</div>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Width Table -->
                <div class="full-table glass">
                    <div class="card-header">
                        <h3>Latest Transactions</h3>
                        <div class="table-actions">
                            <button class="btn btn-outline btn-sm" id="filter-btn">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                            <button class="btn btn-outline btn-sm" id="export-table-btn">
                                <i class="fas fa-download"></i>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-order="7845">
                                    <td>#ORD-7845</td>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">SJ</div>
                                            <span>Sarah Johnson</span>
                                        </div>
                                    </td>
                                    <td>Today, 10:45 AM</td>
                                    <td>$245.99</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td>
                                        <button class="table-action order-action">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-order="7844">
                                    <td>#ORD-7844</td>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">MC</div>
                                            <span>Michael Chen</span>
                                        </div>
                                    </td>
                                    <td>Today, 09:30 AM</td>
                                    <td>$189.50</td>
                                    <td><span class="status-badge shipped">Shipped</span></td>
                                    <td>
                                        <button class="table-action order-action">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-order="7843">
                                    <td>#ORD-7843</td>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">EW</div>
                                            <span>Emma Williams</span>
                                        </div>
                                    </td>
                                    <td>Today, 08:15 AM</td>
                                    <td>$320.00</td>
                                    <td><span class="status-badge processing">Processing</span></td>
                                    <td>
                                        <button class="table-action order-action">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-order="7842">
                                    <td>#ORD-7842</td>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">DK</div>
                                            <span>David Kim</span>
                                        </div>
                                    </td>
                                    <td>Yesterday, 5:30 PM</td>
                                    <td>$156.75</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td>
                                        <button class="table-action order-action">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-order="7841">
                                    <td>#ORD-7841</td>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">LR</div>
                                            <span>Lisa Rodriguez</span>
                                        </div>
                                    </td>
                                    <td>Yesterday, 3:45 PM</td>
                                    <td>$275.30</td>
                                    <td><span class="status-badge shipped">Shipped</span></td>
                                    <td>
                                        <button class="table-action order-action">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div class="page-section" id="products-section">
                <div class="page-header">
                    <h1 class="page-title">Products Management</h1>
                    <div class="page-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-download"></i>
                            Export
                        </button>
                        <button class="btn btn-primary" id="add-new-product">
                            <i class="fas fa-plus"></i>
                            Add Product
                        </button>
                    </div>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>This is the products management section. In a real application, this would display a comprehensive list of products with CRUD functionality.</p>
                </div>
            </div>

            <!-- Customers Section -->
            <div class="page-section" id="customers-section">
                <div class="page-header">
                    <h1 class="page-title">Customers</h1>
                    <div class="page-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-download"></i>
                            Export
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Add Customer
                        </button>
                    </div>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>This is the customers management section. In a real application, this would display customer data and analytics.</p>
                </div>
            </div>

            <!-- Orders Section -->
            <div class="page-section" id="orders-section">
                <div class="page-header">
                    <h1 class="page-title">Orders</h1>
                    <div class="page-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-download"></i>
                            Export
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Create Order
                        </button>
                    </div>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>This is the orders management section. In a real application, this would display order history and processing tools.</p>
                </div>
            </div>

            <!-- Other sections would follow the same pattern -->
            <div class="page-section" id="analytics-section">
                <div class="page-header">
                    <h1 class="page-title">Analytics</h1>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>Advanced analytics dashboard would be displayed here.</p>
                </div>
            </div>

            <div class="page-section" id="discounts-section">
                <div class="page-header">
                    <h1 class="page-title">Discounts & Promotions</h1>
                    <div class="page-actions">
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Create Promotion
                        </button>
                    </div>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>Discount and promotion management tools would be here.</p>
                </div>
            </div>

            <div class="page-section" id="reviews-section">
                <div class="page-header">
                    <h1 class="page-title">Product Reviews</h1>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>Customer reviews and ratings management interface.</p>
                </div>
            </div>

            <div class="page-section" id="settings-section">
                <div class="page-header">
                    <h1 class="page-title">Settings</h1>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>System configuration and settings would be managed here.</p>
                </div>
            </div>

            <div class="page-section" id="profile-section">
                <div class="page-header">
                    <h1 class="page-title">User Profile</h1>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>User profile and account settings would be displayed here.</p>
                </div>
            </div>

            <div class="page-section" id="support-section">
                <div class="page-header">
                    <h1 class="page-title">Help & Support</h1>
                </div>
                <div class="glass" style="padding: 2rem;">
                    <p>Help documentation and support contact options would be here.</p>
                </div>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <div class="modal" id="export-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Export Data</h3>
                <button class="modal-close" id="close-export-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Export Format</label>
                    <select class="form-control">
                        <option>CSV</option>
                        <option>Excel</option>
                        <option>PDF</option>
                        <option>JSON</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Date Range</label>
                    <select class="form-control">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last quarter</option>
                        <option>Last year</option>
                        <option>Custom range</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancel-export">Cancel</button>
                <button class="btn btn-primary">Export Data</button>
            </div>
        </div>
    </div>

    <div class="modal" id="product-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Product</h3>
                <button class="modal-close" id="close-product-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter product description"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-control">
                        <option>Electronics</option>
                        <option>Clothing</option>
                        <option>Home & Garden</option>
                        <option>Sports</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancel-product">Cancel</button>
                <button class="btn btn-primary">Save Product</button>
            </div>
        </div>
    </div>

    <div class="modal" id="notifications-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Notifications (5)</h3>
                <button class="modal-close" id="close-notifications-modal">&times;</button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="notification-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: var(--primary-light); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-shopping-cart" style="color: var(--primary);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">New order received</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark);">Order #ORD-7846 from Michael Chen</div>
                        </div>
                    </div>
                </div>
                <div class="notification-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: var(--secondary-light); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check" style="color: var(--secondary);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">Order shipped</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark);">Order #ORD-7841 has been shipped</div>
                        </div>
                    </div>
                </div>
                <div class="notification-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: var(--warning-light); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-exclamation" style="color: var(--warning);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">Low stock alert</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark);">Wireless Headphones Pro is running low</div>
                        </div>
                    </div>
                </div>
                <div class="notification-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: var(--info-light); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-star" style="color: var(--info);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">New review</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark);">Lisa Rodriguez rated Smart Watch X4 with 5 stars</div>
                        </div>
                    </div>
                </div>
                <div class="notification-item" style="padding: 1rem;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: var(--danger-light); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-times" style="color: var(--danger);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">Order cancelled</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark);">Order #ORD-7839 was cancelled by customer</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="mark-all-read">Mark All as Read</button>
            </div>
        </div>
    </div>

    <div class="modal" id="messages-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Messages (3)</h3>
                <button class="modal-close" id="close-messages-modal">&times;</button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="message-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="customer-avatar">SJ</div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between;">
                                <div style="font-weight: 600;">Sarah Johnson</div>
                                <div style="font-size: 0.8rem; color: var(--gray-dark);">2 hours ago</div>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--gray-dark);">Hi, I have a question about my order #ORD-7845</div>
                        </div>
                    </div>
                </div>
                <div class="message-item" style="padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="customer-avatar">MC</div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between;">
                                <div style="font-weight: 600;">Michael Chen</div>
                                <div style="font-size: 0.8rem; color: var(--gray-dark);">5 hours ago</div>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--gray-dark);">The product arrived damaged, what should I do?</div>
                        </div>
                    </div>
                </div>
                <div class="message-item" style="padding: 1rem;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="customer-avatar">EW</div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between;">
                                <div style="font-weight: 600;">Emma Williams</div>
                                <div style="font-size: 0.8rem; color: var(--gray-dark);">1 day ago</div>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--gray-dark);">Thank you for the excellent service!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">View All Messages</button>
            </div>
        </div>
    </div>

    <div class="modal" id="order-action-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Order Actions</h3>
                <button class="modal-close" id="close-order-action-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <button class="btn btn-outline" style="text-align: left; justify-content: flex-start;">
                        <i class="fas fa-eye"></i> View Order Details
                    </button>
                    <button class="btn btn-outline" style="text-align: left; justify-content: flex-start;">
                        <i class="fas fa-print"></i> Print Invoice
                    </button>
                    <button class="btn btn-outline" style="text-align: left; justify-content: flex-start;">
                        <i class="fas fa-truck"></i> Update Shipping
                    </button>
                    <button class="btn btn-outline" style="text-align: left; justify-content: flex-start;">
                        <i class="fas fa-envelope"></i> Contact Customer
                    </button>
                    <button class="btn btn-outline" style="text-align: left; justify-content: flex-start; color: var(--danger);">
                        <i class="fas fa-times"></i> Cancel Order
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="logout-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Logout</h3>
                <button class="modal-close" id="close-logout-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out of your account?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancel-logout">Cancel</button>
                <button class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const sidebar = document.querySelector('.sidebar');
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const navItems = document.querySelectorAll('.nav-item');
        const pageSections = document.querySelectorAll('.page-section');
        const userProfile = document.getElementById('user-profile');
        const searchInput = document.getElementById('search-input');
        const searchResults = document.getElementById('search-results');
        const exportBtn = document.getElementById('export-btn');
        const exportTableBtn = document.getElementById('export-table-btn');
        const addProductBtn = document.getElementById('add-product-btn');
        const addNewProductBtn = document.getElementById('add-new-product');
        const notificationsBtn = document.getElementById('notifications-btn');
        const messagesBtn = document.getElementById('messages-btn');
        const messagesDropdown = document.getElementById('messages-dropdown');
        const logoutBtn = document.getElementById('logout-btn');
        const orderItems = document.querySelectorAll('.order-item');
        const productItems = document.querySelectorAll('.product-item');
        const orderActions = document.querySelectorAll('.order-action');
        const viewAllLinks = document.querySelectorAll('.view-all');

        // Modals
        const exportModal = document.getElementById('export-modal');
        const closeExportModal = document.getElementById('close-export-modal');
        const cancelExport = document.getElementById('cancel-export');
        const productModal = document.getElementById('product-modal');
        const closeProductModal = document.getElementById('close-product-modal');
        const cancelProduct = document.getElementById('cancel-product');
        const notificationsModal = document.getElementById('notifications-modal');
        const closeNotificationsModal = document.getElementById('close-notifications-modal');
        const markAllRead = document.getElementById('mark-all-read');
        const messagesModal = document.getElementById('messages-modal');
        const closeMessagesModal = document.getElementById('close-messages-modal');
        const orderActionModal = document.getElementById('order-action-modal');
        const closeOrderActionModal = document.getElementById('close-order-action-modal');
        const logoutModal = document.getElementById('logout-modal');
        const closeLogoutModal = document.getElementById('close-logout-modal');
        const cancelLogout = document.getElementById('cancel-logout');

        // Mobile menu toggle
        mobileMenuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Navigation functionality
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const sectionId = item.getAttribute('data-section') + '-section';
                
                // Update active nav item
                navItems.forEach(navItem => navItem.classList.remove('active'));
                item.classList.add('active');
                
                // Show corresponding section
                pageSections.forEach(section => section.classList.remove('active'));
                document.getElementById(sectionId).classList.add('active');
                
                // Close mobile menu if open
                sidebar.classList.remove('active');
            });
        });

        // User profile dropdown
        userProfile.addEventListener('click', () => {
            userProfile.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userProfile.contains(e.target)) {
                userProfile.classList.remove('active');
            }
        });

        // Search functionality
        searchInput.addEventListener('focus', () => {
            searchResults.style.display = 'block';
        });

        searchInput.addEventListener('blur', () => {
            setTimeout(() => {
                searchResults.style.display = 'none';
            }, 200);
        });

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const results = document.querySelectorAll('.search-result-item');
            
            if (query.length > 0) {
                results.forEach(result => {
                    const text = result.textContent.toLowerCase();
                    if (text.includes(query)) {
                        result.style.display = 'flex';
                    } else {
                        result.style.display = 'none';
                    }
                });
                searchResults.style.display = 'block';
            } else {
                results.forEach(result => result.style.display = 'flex');
                searchResults.style.display = 'none';
            }
        });

        // Search result items click
        document.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('click', () => {
                searchInput.value = item.textContent.trim();
                searchResults.style.display = 'none';
                alert(`You searched for: ${item.textContent.trim()}`);
            });
        });

        // Export buttons
        exportBtn.addEventListener('click', () => {
            exportModal.classList.add('active');
        });

        exportTableBtn.addEventListener('click', () => {
            exportModal.classList.add('active');
        });

        closeExportModal.addEventListener('click', () => {
            exportModal.classList.remove('active');
        });

        cancelExport.addEventListener('click', () => {
            exportModal.classList.remove('active');
        });

        // Add product buttons
        addProductBtn.addEventListener('click', () => {
            productModal.classList.add('active');
        });

        addNewProductBtn.addEventListener('click', () => {
            productModal.classList.add('active');
        });

        closeProductModal.addEventListener('click', () => {
            productModal.classList.remove('active');
        });

        cancelProduct.addEventListener('click', () => {
            productModal.classList.remove('active');
        });

        // Notifications
        notificationsBtn.addEventListener('click', () => {
            notificationsModal.classList.add('active');
        });

        closeNotificationsModal.addEventListener('click', () => {
            notificationsModal.classList.remove('active');
        });

        markAllRead.addEventListener('click', () => {
            document.querySelectorAll('.notification-badge').forEach(badge => {
                badge.textContent = '0';
                badge.style.display = 'none';
            });
            notificationsModal.classList.remove('active');
        });

        // Messages
        messagesBtn.addEventListener('click', () => {
            messagesModal.classList.add('active');
        });

        messagesDropdown.addEventListener('click', (e) => {
            e.preventDefault();
            messagesModal.classList.add('active');
            userProfile.classList.remove('active');
        });

        closeMessagesModal.addEventListener('click', () => {
            messagesModal.classList.remove('active');
        });

        // Order items click
        orderItems.forEach(item => {
            item.addEventListener('click', () => {
                const orderId = item.getAttribute('data-order');
                alert(`Viewing details for order #ORD-${orderId}`);
            });
        });

        // Product items click
        productItems.forEach(item => {
            item.addEventListener('click', () => {
                const productId = item.getAttribute('data-product');
                alert(`Viewing details for product ID: ${productId}`);
            });
        });

        // Order actions
        orderActions.forEach(action => {
            action.addEventListener('click', (e) => {
                e.stopPropagation();
                orderActionModal.classList.add('active');
            });
        });

        closeOrderActionModal.addEventListener('click', () => {
            orderActionModal.classList.remove('active');
        });

        // View all links
        viewAllLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const sectionId = link.getAttribute('data-section') + '-section';
                
                // Update active nav item
                navItems.forEach(navItem => navItem.classList.remove('active'));
                document.querySelector(`.nav-item[data-section="${link.getAttribute('data-section')}"]`).classList.add('active');
                
                // Show corresponding section
                pageSections.forEach(section => section.classList.remove('active'));
                document.getElementById(sectionId).classList.add('active');
            });
        });

        // Logout
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.classList.add('active');
            userProfile.classList.remove('active');
        });

        closeLogoutModal.addEventListener('click', () => {
            logoutModal.classList.remove('active');
        });

        cancelLogout.addEventListener('click', () => {
            logoutModal.classList.remove('active');
        });

        // Simulate logout
        document.querySelector('#logout-modal .btn-danger').addEventListener('click', () => {
            alert('You have been logged out. Redirecting to login page...');
            logoutModal.classList.remove('active');
        });

        // Initialize metric chart animations
        document.addEventListener('DOMContentLoaded', () => {
            const chartLines = document.querySelectorAll('.chart-line');
            chartLines.forEach(line => {
                line.style.width = '0';
                setTimeout(() => {
                    line.style.width = line.style.getPropertyValue('--percentage');
                }, 100);
            });
        });

        // Time period buttons functionality
        const timeButtons = document.querySelectorAll('.btn-time');
        timeButtons.forEach(button => {
            button.addEventListener('click', function() {
                timeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Animate the chart bars
                const chartBars = document.querySelectorAll('.chart-bar');
                chartBars.forEach(bar => {
                    const currentHeight = bar.style.getPropertyValue('--height');
                    const randomChange = Math.random() * 20 - 10; // -10% to +10% change
                    const newHeight = Math.min(100, Math.max(5, parseFloat(currentHeight) + randomChange));
                    bar.style.setProperty('--height', newHeight + '%');
                    bar.setAttribute('data-value', '$' + (Math.round(newHeight * 370) + 10000).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                });
            });
        });
    </script>
</body>
</html>