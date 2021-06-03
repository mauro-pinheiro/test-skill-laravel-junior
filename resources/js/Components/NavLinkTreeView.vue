<template>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <slot name="icon"></slot>
            <p><slot name="label"></slot><i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <slot></slot>
        </ul>
    </li>
</template>
