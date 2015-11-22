<div class="sidebar sidebar-secondary sidebar-default">
    <div class="sidebar-content">

        <!-- Sidebar search -->
            @include('admin::layout.'.$layout.'.inc.search')
        <!-- /sidebar search -->


        <!-- Sub navigation -->
        <div class="sidebar-category">
            <div class="category-title">
                <span>Tree Structure</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>

            <div class="category-content no-padding">
                <div class="tree-default well border-left-info border-left-lg">
                    {!! $StructureTree !!}
                    <!--<ul>
                        <li class="folder expanded">Expanded folder with children
                            <ul>
                                <li class="expanded">Expanded sub-item
                                    <ul>
                                        <li class="active focused">Active sub-item (active and focus on init)</li>
                                        <li>Basic <i>menu item</i> with <strong class="text-semibold">HTML support</strong></li>
                                    </ul>
                                </li>
                                <li>Collapsed sub-item
                                    <ul>
                                        <li>Sub-item 2.2.1</li>
                                        <li>Sub-item 2.2.2</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-tooltip" title="Look, a tool tip!">Menu item with key and tooltip</li>
                        <li class="folder">Collapsed folder
                            <ul>
                                <li>Sub-item 1.1</li>
                                <li>Sub-item 1.2</li>
                            </ul>
                        </li>
                        <li class="selected">This is a selected item</li>
                        <li class="expanded">Document with some children (expanded on init)
                            <ul>
                                <li>Document sub-item</li>
                                <li>Another document sub-item
                                    <ul>
                                        <li>Sub-item 2.1.1</li>
                                        <li>Sub-item 2.1.2</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- /sub navigation -->

    </div>
</div>