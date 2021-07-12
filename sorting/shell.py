def shell_short(Inputlist):
    gap = len(Inputlist) // 2
    while gap > 0:
        for i in range(gap, len(Inputlist)):
            temp = Inputlist[i]
            j = i
            # Short the sub list for this gap
            while j >= gap and Inputlist[j -gap] > temp:
                Inputlist[j] = Inputlist[j -gap]
                j = j - gap
            Inputlist[j] = temp
        
        # Reduce the gap for the next element
        gap = gap // 2

list = [19, 2, 31, 45, 38, 11, 121, 27]

shell_short(list)
print(list)