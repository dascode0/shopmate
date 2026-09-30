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
            0 5px 14px rgba(7, 150, 95, 0.18);
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

    .category-flash-error {
        border-color: #f1caca;
        background: #fff3f3;
        color: #a83b41;
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

    .category-modal {
        position: fixed;
        inset: 0;
        z-index: 1100;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(14, 30, 23, 0.48);
    }

    .category-modal.open {
        display: flex;
    }

    .category-modal-card {
        width: min(100%, 480px);
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        padding: 24px;
        border: 1px solid #e5ece9;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 18px 50px rgba(12, 39, 27, 0.2);
    }

    .category-modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .category-modal-header h3 {
        margin-bottom: 5px;
        color: #17221d;
        font-size: 18px;
    }

    .category-modal-header p {
        color: #89958f;
        font-size: 12px;
    }

    .category-modal-close {
        width: 32px;
        height: 32px;
        border: 1px solid #e5ece9;
        border-radius: 7px;
        background: #fff;
        color: #68746d;
        font-size: 19px;
        cursor: pointer;
    }

    .category-form-field {
        margin-bottom: 16px;
    }

    .category-form-field label {
        display: block;
        margin-bottom: 7px;
        color: #35433c;
        font-size: 12px;
        font-weight: 700;
    }

    .category-form-field input,
    .category-form-field textarea,
    .category-form-field select {
        width: 100%;
        border: 1px solid #dfe7e3;
        border-radius: 7px;
        padding: 10px 11px;
        background: #fff;
        color: #35433c;
        font: inherit;
        font-size: 13px;
        outline: none;
    }

    .category-form-field textarea {
        min-height: 90px;
        resize: vertical;
    }

    .category-form-field input:focus,
    .category-form-field textarea:focus,
    .category-form-field select:focus {
        border-color: #07965f;
        box-shadow: 0 0 0 3px rgba(7, 150, 95, 0.1);
    }

    .category-form-field .field-error {
        margin-top: 5px;
        color: #d34e53;
        font-size: 11px;
    }

    .category-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 22px;
    }

    .category-form-actions button {
        padding: 10px 14px;
        border: 1px solid #e0e8e3;
        border-radius: 7px;
        background: #fff;
        color: #536159;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .category-form-actions .save-category-btn {
        border-color: #07965f;
        background: #07965f;
        color: #fff;
    }

    .category-flash {
        margin-bottom: 16px;
        padding: 11px 14px;
        border: 1px solid #ccebdc;
        border-radius: 8px;
        background: #effaf4;
        color: #176b49;
        font-size: 13px;
    }

    .category-empty-row {
        padding: 28px !important;
        color: #89958f !important;
        text-align: center;
    }

    .edit-category-modal {
        position: fixed;
        inset: 0;
        z-index: 1110;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(14, 30, 23, 0.48);
    }

    .edit-category-modal.open {
        display: flex;
    }

    .edit-category-card {
        width: min(100%, 500px);
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        padding: 24px;
        border: 1px solid #e5ece9;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 18px 50px rgba(12, 39, 27, 0.2);
    }

    .edit-category-image {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
        padding: 12px;
        border: 1px solid #edf1ee;
        border-radius: 9px;
        background: #fafcfb;
    }

    .edit-category-image img,
    .edit-category-image-placeholder {
        width: 58px;
        height: 58px;
        flex: 0 0 58px;
        border-radius: 8px;
        object-fit: cover;
    }

    .edit-category-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e9f8f1;
        color: #07965f;
        font-size: 20px;
    }

    .edit-category-image p {
        color: #89958f;
        font-size: 11px;
        line-height: 1.5;
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
            id="open-category-form">

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
                    {{ $totalCategories }}
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
                    {{ $activeCategories }}
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
                    {{ $inactiveCategories }}
                </strong>

            </div>

        </div>

    </div>


    {{-- =========================================
         CATEGORY TABLE CARD
    ========================================== --}}

    <div class="category-card">

        @if (session('success'))
        <div class="category-flash" role="status">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="category-flash category-flash-error" role="alert">
            {{ session('error') }}
        </div>
        @endif

        {{-- TOOLBAR --}}

        <div class="category-toolbar">


            {{-- SEARCH --}}

            <div class="category-search">

                <span class="category-search-icon">
                    ⌕
                </span>

                <input
                    type="text"
                    placeholder="Search categories...">

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

                    @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <div class="category-name">
                                <div class="category-icon">
                                    @if ($category->image_path)
                                    <img src="{{ asset('storage/' . ltrim($category->image_path, '/')) }}" alt="{{ $category->name }} image" style="width: 50px; height: 100%; object-fit: cover; border-radius: 8px;">
                                    @else
                                    ▣
                                    @endif
                                </div>
                                <div class="category-name-text">
                                    <strong>{{ $category->name }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>{{ $category->description ?: '—' }}</td>
                        <td>{{ $category->products_count }}</td>
                        <td>
                            <span class="status-badge {{ $category->status ? 'status-active' : 'status-inactive' }}">
                                {{ $category->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $category->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button
                                    type="button"
                                    class="action-btn edit-category-btn"
                                    title="Edit"
                                    aria-label="Edit {{ $category->name }}"
                                    data-category-id="{{ $category->id }}"
                                    data-update-url="{{ route('categories.update', $category->id) }}"
                                    data-name="{{ $category->name }}"
                                    data-description="{{ $category->description }}"
                                    data-status="{{ $category->status ? '1' : '0' }}"
                                    data-sort-order="{{ $category->sort_order }}"
                                    data-image="{{ $category->image_path ? asset('storage/' . ltrim($category->image_path, '/')) : '' }}">✎</button>
                                <button
                                    type="button"
                                    class="action-btn delete delete-category-btn"
                                    title="Delete"
                                    aria-label="Delete {{ $category->name }}"
                                    data-delete-url="{{ route('categories.destroy', $category->id) }}"
                                    data-name="{{ $category->name }}">🗑</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="category-empty-row">
                            No saved categories yet. Select “Add Category” to create your first one.
                        </td>
                    </tr>
                    @endif

                </tbody>

            </table>

        </div>


        <div class="table-footer">

            <div class="showing-text">

                Showing <strong>{{ $categories->count() }}</strong>
                of <strong>{{ $totalCategories }}</strong> categories

            </div>

        </div>

    </div>

</div>

<div class="edit-category-modal {{ old('_edit_category_id') ? 'open' : '' }}" id="edit-category-modal" aria-hidden="{{ old('_edit_category_id') ? 'false' : 'true' }}">
    <section
        class="edit-category-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="edit-category-title">
        <form method="POST" action="#" enctype="multipart/form-data" id="edit-category-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="_edit_category_id" id="edit-category-id" value="{{ old('_edit_category_id') }}">
            <div class="category-modal-header">
                <div>
                    <h3 id="edit-category-title">Edit Category</h3>
                    <p>Update the category details and display settings.</p>
                </div>
                <button type="button" class="category-modal-close edit-category-close" aria-label="Close form">&times;</button>
            </div>

            <div class="edit-category-image">
                <div class="edit-category-image-placeholder" id="edit-category-image-placeholder">▣</div>
                <img id="edit-category-image-preview" src="" alt="Category image preview" hidden>
                <p>Choose a new image or keep the current category image.</p>
            </div>

            <div class="category-form-field">
                <label for="edit-category-name">Category name <span aria-hidden="true">*</span></label>
                <input id="edit-category-name" name="name" type="text" value="{{ old('name') }}" maxlength="255" required>
                @error('name')
                <p class="field-error">{{ $message }}</p>
                @enderror
                </div>

                <div class="category-form-field">
                    <label for="edit-category-description">Description</label>
                    <textarea id="edit-category-description" name="description" maxlength="2000" placeholder="Briefly describe this category">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="category-form-field">
                    <label for="edit-category-image-file">Category image</label>
                    <input id="edit-category-image-file" name="image" type="file" accept="image/*">
                    @error('image')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="category-form-field">
                    <label for="edit-category-status">Status</label>
                    <select id="edit-category-status" name="status" required>
                        <option value="1" {{ old('status', '1') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="category-form-field">
                    <label for="edit-category-order">Display order</label>
                    <input id="edit-category-order" name="order" type="number" value="{{ old('order', '0') }}" min="0">
                    @error('order')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                    @error('_edit_category_id')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
            </div>

            <div class="category-form-actions">
                <button type="button" class="category-modal-cancel edit-category-close">Cancel</button>
                <button type="submit" class="save-category-btn">Save Changes</button>
            </div>
        </form>
    </section>
</div>

<div class="edit-category-modal" id="delete-category-modal" aria-hidden="true">
    <section class="edit-category-card" role="dialog" aria-modal="true" aria-labelledby="delete-category-title">
        <div class="category-modal-header">
            <div>
                <h3 id="delete-category-title">Delete Category?</h3>
                <p>This will permanently delete <strong id="delete-category-name"></strong>. This action cannot be undone.</p>
            </div>
            <button type="button" class="category-modal-close delete-category-cancel" aria-label="Close confirmation">&times;</button>
        </div>
        <form method="POST" action="#" id="delete-category-form">
            @csrf
            @method('DELETE')
            <div class="category-form-actions">
                <button type="button" class="delete-category-cancel">Cancel</button>
                <button type="submit" class="save-category-btn category-delete-confirm">Delete Category</button>
            </div>
        </form>
    </section>
</div>

<div
    class="category-modal {{ $errors->any() && !old('_edit_category_id') ? 'open' : '' }}"
    id="category-modal"
    aria-hidden="{{ $errors->any() && !old('_edit_category_id') ? 'false' : 'true' }}">
    <section
        class="category-modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="category-modal-title">
        <div class="category-modal-header">
            <div>
                <h3 id="category-modal-title">Add Category</h3>
                <p>Create a category to organize your products.</p>
            </div>
            <button type="button" class="category-modal-close" aria-label="Close form">&times;</button>
        </div>

        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="category-form-field">
                <label for="category-name">Category name <span aria-hidden="true">*</span></label>
                <input
                    id="category-name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    maxlength="255"
                    required
                    autofocus
                    class="@error('name') is-invalid @enderror">
                @error('name')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="category-form-field">
                <label for="category-description">Description</label>
                <textarea
                    id="category-description"
                    name="description"
                    maxlength="2000"
                    placeholder="Briefly describe this category">{{ old('description') }}</textarea>
                @error('description')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="image-preview" style="display: none;">
                <img id="category-image-preview" src="#" alt="Category Image Preview" style="max-width: 100px; height: auto; margin-top: 10px; border-radius: 5px;">
            </div>

            <div class="category-form-field">
                <label for="category-image">Category Image</label>
                <input
                    id="category-image"
                    name="image"
                    type="file"
                    accept="image/*"
                    onchange="updateImagePreview(event)">
                @error('image')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="category-form-field">
                <label for="category-status">Status</label>
                <select id="category-status" name="status" required>
                    <option value="1" {{ old('status', '1') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="category-form-field">
                <label for="category-order">Display Order</label>
                <input
                    id="category-order"
                    name="order"
                    type="number"
                    value="{{ old('order', '0') }}"
                    min="0">
                @error('order')
                <p class="field-error">{{ $message }}</p>
                @enderror

            </div>

            <div class="category-form-actions">
                <button type="button" class="category-modal-cancel">Cancel</button>
                <button type="submit" class="save-category-btn">Save Category</button>
            </div>
        </form>
    </section>
</div>

<script>
    (() => {
        const modal = document.getElementById('category-modal');
        const openButton = document.getElementById('open-category-form');
        const closeButtons = modal.querySelectorAll('.category-modal-close, .category-modal-cancel');
        const nameInput = document.getElementById('category-name');

        const openModal = () => {
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            nameInput.focus();
        };

        const closeModal = () => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            openButton.focus();
        };

        openButton.addEventListener('click', openModal);
        closeButtons.forEach((button) => button.addEventListener('click', closeModal));
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('open')) {
                closeModal();
            }
        });
    })();

    const updateImagePreview = (event) => {
        const imagePreview = document.getElementById('category-image-preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreview.parentElement.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.parentElement.style.display = 'none';
        }
    };

    (() => {
        const modal = document.getElementById('edit-category-modal');
        const nameInput = document.getElementById('edit-category-name');
        const descriptionInput = document.getElementById('edit-category-description');
        const statusInput = document.getElementById('edit-category-status');
        const orderInput = document.getElementById('edit-category-order');
        const categoryIdInput = document.getElementById('edit-category-id');
        const editForm = document.getElementById('edit-category-form');
        const imageInput = document.getElementById('edit-category-image-file');
        const imagePreview = document.getElementById('edit-category-image-preview');
        const imagePlaceholder = document.getElementById('edit-category-image-placeholder');
        let activeEditButton = null;

        const openForCategory = (button) => {
            activeEditButton = button;
            categoryIdInput.value = button.dataset.categoryId || '';
            editForm.action = button.dataset.updateUrl || '#';
            nameInput.value = button.dataset.name || '';
            descriptionInput.value = button.dataset.description || '';
            statusInput.value = button.dataset.status || '1';
            orderInput.value = button.dataset.sortOrder || '0';
            imageInput.value = '';

            const imageUrl = button.dataset.image;
            imagePreview.src = imageUrl || '';
            imagePreview.hidden = !imageUrl;
            imagePlaceholder.hidden = Boolean(imageUrl);

            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            nameInput.focus();
        };

        const closeModal = () => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            if (activeEditButton) {
                activeEditButton.focus();
            }
        };

        document.querySelectorAll('.edit-category-btn').forEach((button) => {
            button.addEventListener('click', () => {
                openForCategory(button);
            });
        });

        const reopenEditCategoryId = @json(old('_edit_category_id'));
        if (reopenEditCategoryId) {
            const editButton = Array.from(document.querySelectorAll('.edit-category-btn'))
                .find((button) => button.dataset.categoryId === String(reopenEditCategoryId));

            if (editButton) {
                openForCategory(editButton);
                nameInput.value = @json(old('name', ''));
                descriptionInput.value = @json(old('description', ''));
                statusInput.value = @json(old('status', '1'));
                orderInput.value = @json(old('order', '0'));
            }
        }

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (!file) {
                return;
            }

            imagePreview.src = URL.createObjectURL(file);
            imagePreview.hidden = false;
            imagePlaceholder.hidden = true;
        });

        modal.querySelectorAll('.edit-category-close').forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('open')) {
                closeModal();
            }
        });
    })();

    (() => {
        const modal = document.getElementById('delete-category-modal');
        const form = document.getElementById('delete-category-form');
        const categoryName = document.getElementById('delete-category-name');
        let activeDeleteButton = null;

        const closeModal = () => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            if (activeDeleteButton) {
                activeDeleteButton.focus();
            }
        };

        document.querySelectorAll('.delete-category-btn').forEach((button) => {
            button.addEventListener('click', () => {
                activeDeleteButton = button;
                form.action = button.dataset.deleteUrl || '#';
                categoryName.textContent = button.dataset.name || 'this category';
                modal.classList.add('open');
                modal.setAttribute('aria-hidden', 'false');
                modal.querySelector('.category-delete-confirm').focus();
            });
        });

        modal.querySelectorAll('.delete-category-cancel').forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('open')) {
                closeModal();
            }
        });
    })();
</script>

@endsection