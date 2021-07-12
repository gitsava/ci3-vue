def insertion_sort(Inputlist):
    for i in range(1, len(Inputlist)):
        j = i-1
        nxt_elm = Inputlist[i]

        # Compare the current element with next time
        while (Inputlist[j] > nxt_elm) and (j >= 0):
            Inputlist[j+1] = list[j]
            j = j-1
        Inputlist[j+1] = nxt_elm

list = [19,2,31,45,30,11,121,27]
insertion_sort(list)

print(list)