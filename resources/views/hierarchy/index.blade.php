<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            L'Organigramme de l'Entreprise
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <!-- Traditional Org Chart Tree Structure -->
        <div class="org-chart">
            <!-- Top Level: RH -->
            <ul class="tree">
                @forelse($groupedEmployees['rh'] ?? [] as $hr)
                    <li>
                        <div class="node rh-node">
                            <span class="name">{{ $hr->first_name }} {{ $hr->last_name }}</span>
                            <span class="title">Ressources Humaines</span>
                        </div>
                        
                        <!-- Middle Level: Managers -->
                        <ul>
                            @forelse($groupedEmployees['manager'] ?? [] as $index => $manager)
                                <li>
                                    <div class="node manager-node">
                                        <span class="name">{{ $manager->first_name }} {{ $manager->last_name }}</span>
                                        <span class="title">Manager</span>
                                    </div>
                                    
                                    <!-- Bottom Level: Employees -->
                                    <ul>
                                        @php
                                            // Distribute employees among managers
                                            $employeeCount = count($groupedEmployees['employee'] ?? []);
                                            $managerCount = count($groupedEmployees['manager'] ?? []);
                                            $perManager = $managerCount > 0 ? ceil($employeeCount / $managerCount) : 0;
                                            $start = $index * $perManager;
                                            $end = min(($index + 1) * $perManager, $employeeCount);
                                            $managerEmployees = array_slice($groupedEmployees['employee'] ?? [], $start, $end - $start);
                                        @endphp
                                        
                                        @forelse($managerEmployees as $employee)
                                            <li>
                                                <div class="node employee-node">
                                                    <span class="name">{{ $employee->first_name }} {{ $employee->last_name }}</span>
                                                    <span class="title">Employé</span>
                                                </div>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="node empty-node">
                                                    <span class="name">Aucun employé</span>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </li>
                            @empty
                                <li>
                                    <div class="node empty-node">
                                        <span class="name">Aucun manager</span>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </li>
                @empty
                    <li>
                        <div class="node empty-node">
                            <span class="name">Aucun responsable RH</span>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

    <style>
        /* Traditional Org Chart Styles */
        .org-chart {
            margin: 20px 0;
            overflow-x: auto;
        }
        
        .tree {
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
            list-style-type: none;
        }
        
        .tree ul {
            padding-top: 20px;
            position: relative;
            display: flex;
            transition: all 0.5s;
            list-style-type: none;
        }
        
        .tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        /* Lines for connections */
        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            width: 50%;
            height: 20px;
            border-top: 2px solid #ccc;
        }
        
        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #ccc;
        }
        
        /* Remove left connector from first child and right connector from last child */
        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }
        
        /* Connect first and last child with parent */
        .tree li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
        }
        
        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }
        
        /* Remove top connector for first level */
        .tree > li::before,
        .tree > li::after {
            border: 0 none;
        }
        
        /* Vertical line connecting to parent for downward levels */
        .tree li:only-child::after,
        .tree li:only-child::before {
            border-right: 0 none;
        }
        
        .tree li:only-child {
            padding-top: 0;
        }
        
        /* Node styling */
        .node {
            border-radius: 5px;
            padding: 8px 15px;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            display: inline-block;
            width: 180px;
            transition: all 0.3s;
        }
        
        .node:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .name {
            display: block;
            font-weight: bold;
            margin-bottom: 2px;
        }
        
        .title {
            display: block;
            font-size: 0.8rem;
            opacity: 0.8;
        }
        
        /* Node color styling */
        .rh-node {
            background-color: #3b82f6;
            color: white;
        }
        
        .manager-node {
            background-color: #10b981;
            color: white;
        }
        
        .employee-node {
            background-color: #f59e0b;
            color: white;
        }
        
        .empty-node {
            background-color: #e5e7eb;
            color: #6b7280;
        }
    </style>
</x-app-layout>