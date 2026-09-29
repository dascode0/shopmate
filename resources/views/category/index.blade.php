@extends('layouts.dashboard')

@section('title', 'Categories')

@section('page-title', 'Categories')


@section('content')

<style>

    /* =========================================
       CATEGORY PAGE
    ========================================= */

    .category-page {
        width: 100%;
    }


    /* =========================================
       PAGE HEADER
    ========================================= */

    .category-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 22px;
    }

    .category-heading h2 {
        font-size: 21px;

        color: #17221d;

        letter-spacing: -0.5px;

        margin-bottom: 5px;
    }

    .category-heading p {
        font-size: 11px;

        color: #89958f;
    }


    /* =========================================
       ADD BUTTON
    ========================================= */

    .add-category-btn {
        border: 0;

        background: #07965f;

        color: white;

        padding: 10px 15px;

        border-radius: 7px;

        font-size: 10px;

        font-weight: 700;

        cursor: pointer;

        display: inline-flex;

        align-items: center;

        gap: 7px;

        transition: 0.2s ease;
    }

    .add-category-btn:hover {
        background: #067f50;

        transform: translateY(-1px);

        box-shadow:
            0 5px 14px rgba(7,150,95,0.18);
    }


    /* =========================================
       STAT CARDS
    ========================================= */

    .category-stats {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 18px;
    }

    .category-stat {
        background: #ffffff;

        border: 1px solid #e5ece9;

        border-radius: 11px;

        padding: 16px;

        display: flex;

        align-items: center;

        gap: 12px;
    }

    .category-stat-icon {
        width: 38px;
        height: 38px;

        border-radius: 9px;

        background: #e9f8f1;

        color: #07965f;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 15px;

        flex-shrink: 0;
    }

    .category-stat-icon.warning {
        background: #fff7e7;

        color: #d18c20;
    }

    .category-stat-icon.danger {
        background: #fff0f0;

        color: #d95258;
    }

    .category-stat-info span {
        display: block;

        font-size: 9px;

        color: #89958f;

        margin-bottom: 4px;
    }

    .category-stat-info strong {
        display: block;

        font-size: 21px;

        color: #17221d;

        letter-spacing: -0.4px;
    }


    /* =========================================
       CATEGORY CARD
    ========================================= */

    .category-card {
        background: white;

        border: 1px solid #e5ece9;

        border-radius: 11px;

        overflow: hidden;
    }


    /* =========================================
       TOOLBAR
    ========================================= */

    .category-toolbar {
        min-height: 64px;

        padding: 13px 17px;

        border-bottom:
            1px solid #edf1ef;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;
    }


    /* SEARCH */

    .category-search {
        width: 270px;

        height: 34px;

        border: 1px solid #e0e8e4;

        border-radius: 7px;

        display: flex;

        align-items: center;

        padding: 0 10px;

        background: #fbfdfc;
    }

    .category-search-icon {
        color: #9aa59f;

        font-size: 13px;
    }

    .category-search input {
        width: 100%;

        border: 0;

        outline: 0;

        background: transparent;

        margin-left: 7px;

        font-size: 10px;

        color: #344139;
    }

    .category-search input::placeholder {
        color: #a2aca7;
    }


    /* FILTER */

    .toolbar-right {
        display: flex;

        align-items: center;

        gap: 8px;
    }

    .filter-select {
        height: 34px;

        border: 1px solid #e0e8e4;

        border-radius: 7px;

        background: white;

        padding: 0 10px;

        font-size: 9px;

        color: #65736c;

        outline: none;

        cursor: pointer;
    }


    /* =========================================
       TABLE
    ========================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .category-table {
        width: 100%;

        border-collapse: collapse;

        min-width: 700px;
    }

    .category-table th {
        background: #fafcfb;

        padding: 11px 17px;

        color: #9aa59f;

        font-size: 8px;

        font-weight: 700;

        text-align: left;

        border-bottom:
            1px solid #edf1ef;
    }

    .category-table td {
        padding: 13px 17px;

        font-size: 9px;

        color: #59675f;

        border-bottom:
            1px solid #f0f3f1;

        vertical-align: middle;
    }

    .category-table tbody tr {
        transition: background 0.15s ease;
    }

    .category-table tbody tr:hover {
        background: #fbfdfc;
    }

    .category-table tbody tr:last-child td {
        border-bottom: 0;
    }


    /* =========================================
       CATEGORY NAME
    ========================================= */

    .category-name {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .category-icon {
        width: 34px;
        height: 34px;

        border-radius: 8px;

        background: #e9f8f1;

        color: #07965f;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 13px;

        flex-shrink: 0;
    }

    .category-name-text strong {
        display: block;

        font-size: 10px;

        color: #26342d;

        margin-bottom: 3px;
    }

    .category-name-text span {
        display: block;

        font-size: 8px;

        color: #9aa59f;
    }


    /* =========================================
       STATUS
    ========================================= */

    .status-badge {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 5px 8px;

        border-radius: 5px;

        font-size: 7px;

        font-weight: 700;
    }

    .status-badge::before {
        content: "";

        width: 5px;
        height: 5px;

        border-radius: 50%;
    }

    .status-active {
        background: #e7f8ef;

        color: #078f5b;
    }

    .status-active::before {
        background: #078f5b;
    }

    .status-inactive {
        background: #fff0f0;

        color: #d74b52;
    }

    .status-inactive::before {
        background: #d74b52;
    }


    /* =========================================
       ACTION BUTTONS
    ========================================= */

    .actions {
        display: flex;

        align-items: center;

        gap: 5px;
    }

    .action-btn {
        width: 27px;
        height: 27px;

        border: 1px solid #e4ebe7;

        border-radius: 6px;

        background: white;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;

        font-size: 11px;

        color: #738078;

        transition: 0.15s ease;
    }

    .action-btn:hover {
        border-color: #07965f;

        color: #07965f;

        background: #f2fbf7;
    }

    .action-btn.delete:hover {
        border-color: #d95258;

        color: #d95258;

        background: #fff4f4;
    }


    /* =========================================
       PAGINATION
    ========================================= */

    .table-footer {
        min-height: 55px;

        padding: 11px 17px;

        border-top:
            1px solid #edf1ef;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;
    }

    .showing-text {
        font-size: 8px;

        color: #9aa59f;
    }

    .pagination {
        display: flex;

        align-items: center;

        gap: 4px;
    }

    .page-btn {
        width: 27px;
        height: 27px;

        border: 1px solid #e2e9e5;

        border-radius: 5px;

        background: white;

        color: #75827b;

        font-size: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;
    }

    .page-btn:hover {
        border-color: #07965f;

        color: #07965f;
    }

    .page-btn.active {
        background: #07965f;

        color: white;

        border-color: #07965f;
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-state {
        padding: 60px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 50px;
        height: 50px;

        border-radius: 50%;

        background: #e9f8f1;

        color: #07965f;

        margin: 0 auto 13px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 19px;
    }

    .empty-state h3 {
        font-size: 13px;

        color: #35433c;

        margin-bottom: 5px;
    }

    .empty-state p {
        font-size: 9px;

        color: #9aa59f;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 700px) {

        .category-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .add-category-btn {
            width: 100%;

            justify-content: center;
        }

        .category-stats {
            grid-template-columns: 1fr;
        }

        .category-toolbar {
            align-items: stretch;

            flex-direction: column;
        }

        .category-search {
            width: 100%;
        }

        .toolbar-right {
            width: 100%;
        }

        .filter-select {
            width: 100%;
        }

        .table-footer {
            align-items: flex-start;

            flex-direction: column;
        }

    }

</style>


<div class="category-page">


    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="category-header">

        <div class="category-heading">

            <h2>
                Categories
            </h2>

            <p>
                Organize your products into categories.
            </p>

        </div>


        <button
            type="button"
            class="add-category-btn"
        >

            <span>+</span>

            Add Category

        </button>

    </div>


    {{-- =========================================
         STATISTICS
    ========================================== --}}

    <div class="category-stats">


        {{-- TOTAL --}}

        <div class="category-stat">

            <div class="category-stat-icon">
                ▣
            </div>

            <div class="category-stat-info">

                <span>
                    Total Categories
                </span>

                <strong>
                    24
                </strong>

            </div>

        </div>


        {{-- ACTIVE --}}

        <div class="category-stat">

            <div class="category-stat-icon">
                ✓
            </div>

            <div class="category-stat-info">

                <span>
                    Active Categories
                </span>

                <strong>
                    21
                </strong>

            </div>

        </div>


        {{-- INACTIVE --}}

        <div class="category-stat">

            <div class="category-stat-icon danger">
                !
            </div>

            <div class="category-stat-info">

                <span>
                    Inactive Categories
                </span>

                <strong>
                    3
                </strong>

            </div>

        </div>

    </div>


    {{-- =========================================
         CATEGORY TABLE CARD
    ========================================== --}}

    <div class="category-card">


        {{-- TOOLBAR --}}

        <div class="category-toolbar">


            {{-- SEARCH --}}

            <div class="category-search">

                <span class="category-search-icon">
                    ⌕
                </span>

                <input
                    type="text"
                    placeholder="Search categories..."
                >

            </div>


            {{-- FILTER --}}

            <div class="toolbar-right">

                <select class="filter-select">

                    <option value="">
                        All Status
                    </option>

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </div>

        </div>


        {{-- =====================================
             TABLE
        ====================================== --}}

        <div class="table-wrapper">

            <table class="category-table">

                <thead>

                    <tr>

                        <th>
                            CATEGORY
                        </th>

                        <th>
                            DESCRIPTION
                        </th>

                        <th>
                            PRODUCTS
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            CREATED
                        </th>

                        <th>
                            ACTIONS
                        </th>

                    </tr>

                </thead>


                <tbody>


                    {{-- CATEGORY 1 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ▣
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Electronics
                                    </strong>

                                    <span>
                                        CAT-001
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Electronic products
                        </td>


                        <td>
                            48
                        </td>


                        <td>

                            <span class="status-badge status-active">
                                Active
                            </span>

                        </td>


                        <td>
                            20 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- CATEGORY 2 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ◫
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Accessories
                                    </strong>

                                    <span>
                                        CAT-002
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Computer accessories
                        </td>


                        <td>
                            32
                        </td>


                        <td>

                            <span class="status-badge status-active">
                                Active
                            </span>

                        </td>


                        <td>
                            18 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- CATEGORY 3 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ▤
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Clothing
                                    </strong>

                                    <span>
                                        CAT-003
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Fashion and clothing
                        </td>


                        <td>
                            67
                        </td>


                        <td>

                            <span class="status-badge status-active">
                                Active
                            </span>

                        </td>


                        <td>
                            15 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- CATEGORY 4 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ♧
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Home & Kitchen
                                    </strong>

                                    <span>
                                        CAT-004
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Home and kitchen items
                        </td>


                        <td>
                            29
                        </td>


                        <td>

                            <span class="status-badge status-active">
                                Active
                            </span>

                        </td>


                        <td>
                            12 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- CATEGORY 5 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ◉
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Sports
                                    </strong>

                                    <span>
                                        CAT-005
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Sports and fitness
                        </td>


                        <td>
                            18
                        </td>


                        <td>

                            <span class="status-badge status-inactive">
                                Inactive
                            </span>

                        </td>


                        <td>
                            08 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- CATEGORY 6 --}}

                    <tr>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    ◇
                                </div>

                                <div class="category-name-text">

                                    <strong>
                                        Beauty
                                    </strong>

                                    <span>
                                        CAT-006
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            Beauty and personal care
                        </td>


                        <td>
                            15
                        </td>


                        <td>

                            <span class="status-badge status-active">
                                Active
                            </span>

                        </td>


                        <td>
                            05 Sep 2026
                        </td>


                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn"
                                    title="Edit"
                                >
                                    ✎
                                </button>

                                <button
                                    type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                >
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                </tbody>

            </table>

        </div>


        {{-- =====================================
             FOOTER / PAGINATION
        ====================================== --}}

        <div class="table-footer">

            <div class="showing-text">

                Showing
                <strong>1</strong>
                to
                <strong>6</strong>
                of
                <strong>24</strong>
                categories

            </div>


            <div class="pagination">

                <button
                    type="button"
                    class="page-btn"
                >
                    ‹
                </button>

                <button
                    type="button"
                    class="page-btn active"
                >
                    1
                </button>

                <button
                    type="button"
                    class="page-btn"
                >
                    2
                </button>

                <button
                    type="button"
                    class="page-btn"
                >
                    3
                </button>

                <button
                    type="button"
                    class="page-btn"
                >
                    4
                </button>

                <button
                    type="button"
                    class="page-btn"
                >
                    ›
                </button>

            </div>

        </div>

    </div>

</div>

@endsection